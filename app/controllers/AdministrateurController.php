<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Personnel.php';
require_once __DIR__ . '/../models/Facture.php';
require_once __DIR__ . '/../models/Paiement.php';
require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../models/Chambre.php';

class AdministrateurController extends Controller
{

    private function gate(): void
    {
        $this->requireRole('administrateur');
    }

    public function dashboard(): void
    {
        $this->gate();

        // Informations administrator connecté
        $userId = (int)($_SESSION['user']['id'] ?? 0);
        $utilisateur = $userId ? (new Personnel())->trouver($userId) : null;
        $nomComplet = $utilisateur ? trim($utilisateur['prenom'] . ' ' . $utilisateur['nom']) : ($_SESSION['user']['nom'] ?? 'Administrateur');

        // Statistiques
        $patients   = (new Patient())->compter();
        $personnels = (new Personnel())->compter();
        $factures   = (new Facture())->compter();
        $total      = (new Facture())->totalMontant();
        $chambres   = (new Chambre())->compter();
        $chambresLibres = (new Chambre())->compterLibres();

        $this->render('administrateur/dashboard', compact(
            'patients',
            'personnels',
            'factures',
            'total',
            'nomComplet',
            'chambres',
            'chambresLibres'
        ));
    }

    public function enregistrer_patient(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/enregistrer_patient');
            }
            try {
                $id = (new Patient())->ajouter($_POST);
                $this->flash(" Patient #$id enregistré avec succès.", 'success');
            } catch (Throwable $e) {
                $this->flash(" Erreur : " . $e->getMessage(), 'error');
            }
            $this->redirect('administrateur/enregistrer_patient');
        }
        $this->render('administrateur/enregistrer_patient');
    }

    public function gerer_personnel(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/gerer_personnel');
            }
            if (!empty($_POST['_delete'])) {
                $id = (int)$_POST['_delete'];
                (new Personnel())->supprimer($id);
                $this->flash("Membre du personnel supprimé.", 'success');
            } else {
                try {
                    (new Personnel())->ajouter($_POST);
                    $this->flash("✅ Personnel ajouté avec succès.", 'success');
                } catch (Throwable $e) {
                    $this->flash("❌ Erreur : " . $e->getMessage(), 'error');
                }
            }
            $this->redirect('administrateur/gerer_personnel');
        }
        $personnels = (new Personnel())->lister();
        $this->render('administrateur/gerer_personnel', ['personnels' => $personnels]);
    }

    public function planifier_rendezvous(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/planifier_rendezvous');
            }
            try {
                (new RendezVous())->ajouter($_POST);
                $this->flash("✅ Rendez-vous planifié avec succès.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ Erreur : " . $e->getMessage(), 'error');
            }
            $this->redirect('administrateur/planifier_rendezvous');
        }
        $patients = (new Patient())->lister();
        $medecins = (new Personnel())->listerMedecins();
        $rdvs     = (new RendezVous())->lister();
        $this->render('administrateur/planifier_rendezvous', compact('patients', 'medecins', 'rdvs'));
    }

    public function affecter_chambre(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/affecter_chambre');
            }
            $cid = (int)($_POST['chambre'] ?? 0);
            $pid = (int)($_POST['patient'] ?? 0);
            if ($cid && $pid && (new Chambre())->affecter($cid, $pid)) {
                $this->flash("✅ Chambre affectée au patient.", 'success');
            } else {
                $this->flash("❌ Sélectionnez un patient et une chambre.", 'error');
            }
            $this->redirect('administrateur/affecter_chambre');
        }
        $patients = (new Patient())->lister();
        $chambres = (new Chambre())->lister();
        $libres   = (new Chambre())->listerLibres();
        $this->render('administrateur/affecter_chambre', compact('patients', 'chambres', 'libres'));
    }

    public function generer_facture(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/generer_facture');
            }
            try {
                $id = (new Facture())->ajouter($_POST);
                $this->flash("✅ Facture #$id générée avec succès.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ Erreur : " . $e->getMessage(), 'error');
            }
            $this->redirect('administrateur/generer_facture');
        }
        $patients = (new Patient())->lister();
        $factures = (new Facture())->lister();
        $this->render('administrateur/generer_facture', compact('patients', 'factures'));
    }

    public function enregistrer_paiement(): void
    {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) {
                $this->redirect('administrateur/enregistrer_paiement');
            }
            try {
                $factureId = (int)($_POST['facture'] ?? 0);
                $pid = (new Paiement())->ajouter($_POST);
                if ($factureId) (new Facture())->marquerPayee($factureId);
                $this->flash("✅ Paiement #$pid enregistré, facture marquée payée.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ Erreur : " . $e->getMessage(), 'error');
            }
            $this->redirect('administrateur/enregistrer_paiement');
        }
        $factures = (new Facture())->listerImpayees();
        $paiements = (new Paiement())->lister();
        $this->render('administrateur/enregistrer_paiement', compact('factures', 'paiements'));
    }

    public function statistiques(): void
    {
        $this->gate();
        $stats = [
            'patients'   => (new Patient())->compter(),
            'personnels' => (new Personnel())->compter(),
            'factures'   => (new Facture())->compter(),
            'total'      => (new Facture())->totalMontant(),
        ];
        $this->render('administrateur/statistiques', ['stats' => $stats]);
    }
}
