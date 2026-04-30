<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Ordonnance.php';
require_once __DIR__ . '/../models/Facture.php';
require_once __DIR__ . '/../models/Examen.php';
require_once __DIR__ . '/../models/Consultation.php';
require_once __DIR__ . '/../models/DemandeConsultation.php';
require_once __DIR__ . '/../models/DemandeSortie.php';

class PatientController extends Controller
{

    private function gate(): void
    {
        $this->requireRole('patient');
    }

    /** Récupère le patient lié à l'utilisateur connecté (création auto si absent). */
    private function currentPatientId(): int
    {
        $userId = (int)($_SESSION['user']['id'] ?? 0);
        if (!$userId) return 0;
        $p = (new Patient())->trouverParUserId($userId);
        if ($p) return (int)$p['id'];
        // Crée un patient minimal lié au user pour éviter les écritures orphelines
        return (new Patient())->ajouter([
            'user_id' => $userId,
            'nom'     => $_SESSION['user']['nom'] ?? 'Patient',
            'prenom'  => '',
            'email'   => $_SESSION['user']['email'] ?? null,
        ]);
    }

    public function dashboard(): void
    {
        $this->gate();
        $pid = $this->currentPatientId();

        // Récupérer les infos du patient
        $patient = (new Patient())->trouver($pid);

        // Récupérer les statistiques
        $consultations = (new Consultation())->listerPourPatient($pid);
        $ordonnances = (new Ordonnance())->listerPourPatient($pid);
        $examens = (new Examen())->listerPourPatient($pid);
        $factures = (new Facture())->listerPourPatient($pid);

        // Dernières consultations (pour l'affichage)
        $derniereConsult = !empty($consultations) ? $consultations[0] : null;

        // Dernière facture (pour l'affichage)
        $derniereFacture = !empty($factures) ? $factures[0] : null;

        // Nom complet du patient
        $nomComplet = $patient ? trim($patient['prenom'] . ' ' . $patient['nom']) : ($_SESSION['user']['nom'] ?? 'Patient');

        // Dernière connexion (simulée pour l'instant)
        $derniereConnexion = date('d/m/Y H:i');

        $this->render('patient/dashboard', compact(
            'rdvs',
            'factures',
            'pid',
            'patient',
            'nomComplet',
            'consultations',
            'ordonnances',
            'examens',
            'factures',
            'derniereConsult',
            'derniereFacture',
            'derniereConnexion'
        ));
    }

    public function dossier_medical(): void
    {
        $this->gate();
        $pid = $this->currentPatientId();
        $consultations = (new Consultation())->listerPourPatient($pid);
        $examens       = (new Examen())->listerPourPatient($pid);
        $this->render('patient/dossier_medical', compact('consultations', 'examens'));
    }

    public function ordonnances(): void
    {
        $this->gate();
        $pid = $this->currentPatientId();
        $ordonnances = (new Ordonnance())->listerPourPatient($pid);
        $this->render('patient/ordonnances', compact('ordonnances'));
    }

    public function analyses(): void
    {
        $this->gate();
        $pid = $this->currentPatientId();
        $examens = (new Examen())->listerPourPatient($pid);
        $this->render('patient/analyses', compact('examens'));
    }

    public function demander_consultation(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('patient/demander_consultation');
            }
            try {
                $_POST['patient_id'] = $this->currentPatientId();
                $id = (new DemandeConsultation())->ajouter($_POST);
                $this->flash("✅ Demande de consultation #$id envoyée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('patient/demander_consultation');
        }
        $this->render('patient/demander_consultation');
    }

    public function demander_sortie(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('patient/demander_sortie');
            }
            try {
                $_POST['patient_id'] = $this->currentPatientId();
                $id = (new DemandeSortie())->ajouter($_POST);
                $this->flash("✅ Demande de sortie #$id envoyée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('patient/demander_sortie');
        }
        $this->render('patient/demander_sortie');
    }

    public function payer_facture(): void
    {
        $this->gate();
        $pid = $this->currentPatientId();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('patient/payer_facture');
            }
            $fid = (int)($_POST['facture_id'] ?? 0);
            if ($fid && (new Facture())->marquerPayee($fid)) {
                $this->flash("✅ Facture #$fid marquée payée.", 'success');
            } else {
                $this->flash("❌ Impossible de payer cette facture.", 'error');
            }
            $this->redirect('patient/payer_facture');
        }
        $factures = (new Facture())->listerPourPatient($pid);
        $this->render('patient/payer_facture', compact('factures'));
    }
}
