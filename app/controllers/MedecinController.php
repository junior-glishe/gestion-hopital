<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Personnel.php';
require_once __DIR__ . '/../models/Consultation.php';
require_once __DIR__ . '/../models/Ordonnance.php';
require_once __DIR__ . '/../models/Examen.php';
require_once __DIR__ . '/../models/Hospitalisation.php';
require_once __DIR__ . '/../models/Chambre.php';
require_once __DIR__ . '/../models/ConstantesVitales.php';

class MedecinController extends Controller {

    private function gate(): void { $this->requireRole('medecin'); }

    private function medecinId(): ?int {
        $email = $_SESSION['user']['email'] ?? null;
        if (!$email) return null;
        $p = (new Personnel())->trouverParEmail($email);
        return $p ? (int)$p['id'] : null;
    }

    public function dashboard(): void {
        $this->gate();
        $patients = (new Patient())->lister();
        $consultations = (new Consultation())->lister();
        $this->render('medecin/dashboard', compact('patients','consultations'));
    }

    public function consulter_dossier(): void {
        $this->gate();
        $patientId = (int)($_GET['id'] ?? 0);
        $patient   = $patientId ? (new Patient())->trouver($patientId) : null;
        $consultations = $patientId ? (new Consultation())->listerPourPatient($patientId) : [];
        $ordonnances   = $patientId ? (new Ordonnance())->listerPourPatient($patientId)   : [];
        $examens       = $patientId ? (new Examen())->listerPourPatient($patientId)       : [];
        $constantes    = $patientId ? (new ConstantesVitales())->listerPourPatient($patientId) : [];
        $patients = (new Patient())->lister();
        $this->render('medecin/consulter_dossier',
            compact('patient','consultations','ordonnances','examens','constantes','patients'));
    }

    public function poser_diagnostic(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/poser_diagnostic'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $id = (new Consultation())->ajouter($_POST);
                $this->flash("✅ Diagnostic #$id enregistré.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/poser_diagnostic');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/poser_diagnostic', compact('patients'));
    }

    public function prescrire_traitement(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/prescrire_traitement'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $id = (new Ordonnance())->ajouter($_POST);
                $this->flash("✅ Ordonnance #$id émise.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/prescrire_traitement');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/prescrire_traitement', compact('patients'));
    }

    public function demander_examens(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/demander_examens'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $id = (new Examen())->ajouter($_POST);
                $this->flash("✅ Demande d'examen #$id créée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/demander_examens');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/demander_examens', compact('patients'));
    }

    public function interpreter_ecg(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/interpreter_ecg'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $_POST['patient']    = $_POST['patient'] ?? $_POST['examen'] ?? 0;
                $id = (new Examen())->ajouterInterpretation($_POST);
                $this->flash("✅ Interprétation ECG #$id sauvegardée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/interpreter_ecg');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/interpreter_ecg', compact('patients'));
    }

    public function planifier_hospitalisation(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/planifier_hospitalisation'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $hid = (new Hospitalisation())->ajouter($_POST);
                if (!empty($_POST['chambre']) && !empty($_POST['patient'])) {
                    (new Chambre())->affecter((int)$_POST['chambre'], (int)$_POST['patient']);
                }
                $this->flash("✅ Hospitalisation #$hid planifiée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/planifier_hospitalisation');
        }
        $patients = (new Patient())->lister();
        $chambres = (new Chambre())->listerLibres();
        $this->render('medecin/planifier_hospitalisation', compact('patients','chambres'));
    }

    public function compte_rendu(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/compte_rendu'); }
            try {
                $_POST['medecin_id'] = $this->medecinId();
                $_POST['type_diagnostic'] = 'Compte-rendu';
                $_POST['diagnostic']      = $_POST['diagnostic_final'] ?? '';
                $_POST['observations']    = "Résumé : " . ($_POST['resume'] ?? '')
                                          . "\nExamens : " . ($_POST['examens_realises'] ?? '')
                                          . "\nTraitements : " . ($_POST['traitements_recus'] ?? '')
                                          . "\nRecommandations : " . ($_POST['recommandations'] ?? '');
                $id = (new Consultation())->ajouter($_POST);
                $this->flash("✅ Compte-rendu #$id sauvegardé.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/compte_rendu');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/compte_rendu', compact('patients'));
    }

    public function autoriser_sortie(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/autoriser_sortie'); }
            try {
                $pid  = (int)($_POST['patient'] ?? 0);
                $date = ($_POST['date_sortie'] ?? '') . ' ' . ($_POST['heure_sortie'] ?? '00:00');
                (new Hospitalisation())->autoriserSortie($pid, trim($date), $_POST['observations'] ?? '');
                $this->flash("✅ Sortie autorisée pour le patient #$pid.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/autoriser_sortie');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/autoriser_sortie', compact('patients'));
    }

    public function transfert_patient(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('medecin/transfert_patient'); }
            try {
                $_POST['medecin_id']      = $this->medecinId();
                $_POST['type_diagnostic'] = 'Transfert (' . ($_POST['urgence'] ?? 'normal') . ')';
                $_POST['diagnostic']      = "Vers service : " . ($_POST['service_destinataire'] ?? '')
                                          . " — Médecin : " . ($_POST['medecin_destinataire'] ?? '');
                $_POST['observations']    = "Motif : " . ($_POST['motif'] ?? '')
                                          . "\nRésumé : " . ($_POST['resume_dossier'] ?? '');
                $id = (new Consultation())->ajouter($_POST);
                $this->flash("✅ Transfert #$id enregistré.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('medecin/transfert_patient');
        }
        $patients = (new Patient())->lister();
        $this->render('medecin/transfert_patient', compact('patients'));
    }
}
