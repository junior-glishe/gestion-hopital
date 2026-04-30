<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Personnel.php';
require_once __DIR__ . '/../models/ConstantesVitales.php';
require_once __DIR__ . '/../models/Soin.php';
require_once __DIR__ . '/../models/Urgence.php';
require_once __DIR__ . '/../models/Hospitalisation.php';
require_once __DIR__ . '/../models/Chambre.php';

class InfirmierController extends Controller {

    private function gate(): void { $this->requireRole('infirmier'); }
    private function infirmierId(): ?int {
        $email = $_SESSION['user']['email'] ?? null;
        if (!$email) return null;
        $p = (new Personnel())->trouverParEmail($email);
        return $p ? (int)$p['id'] : null;
    }

    public function dashboard(): void {
        $this->gate();
        $patients = (new Patient())->lister();
        $this->render('infirmier/dashboard', ['patients' => $patients]);
    }

    public function accueillir_patient(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('infirmier/accueillir_patient'); }
            try {
                // L'infirmier "accueille" → on enregistre l'admission en hospitalisation
                $hid = (new Hospitalisation())->ajouter([
                    'patient'        => $_POST['patient'] ?? 0,
                    'medecin_id'     => $_POST['medecin'] ?? null,
                    'chambre'        => $_POST['chambre'] ?? null,
                    'date_admission' => $_POST['date_admission'] ?: date('Y-m-d H:i:s'),
                    'motif'          => $_POST['motif'] ?? '',
                    'diagnostic'     => $_POST['notes'] ?? '',
                ]);
                if (!empty($_POST['chambre']) && !empty($_POST['patient'])) {
                    (new Chambre())->affecter((int)$_POST['chambre'], (int)$_POST['patient']);
                }
                $this->flash("✅ Patient accueilli (admission #$hid).", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('infirmier/accueillir_patient');
        }
        $patients = (new Patient())->lister();
        $medecins = (new Personnel())->listerMedecins();
        $chambres = (new Chambre())->listerLibres();
        $this->render('infirmier/accueillir_patient', compact('patients','medecins','chambres'));
    }

    public function constantes_vitales(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('infirmier/constantes_vitales'); }
            try {
                $_POST['infirmier_id'] = $this->infirmierId();
                $id = (new ConstantesVitales())->ajouter($_POST);
                $this->flash("✅ Constantes vitales #$id enregistrées.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('infirmier/constantes_vitales');
        }
        $patients = (new Patient())->lister();
        $this->render('infirmier/constantes_vitales', compact('patients'));
    }

    public function soins_surveillance(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('infirmier/soins_surveillance'); }
            try {
                $_POST['infirmier_id'] = $this->infirmierId();
                $id = (new Soin())->ajouter($_POST);
                $this->flash("✅ Soin #$id enregistré.", 'success');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('infirmier/soins_surveillance');
        }
        $patients = (new Patient())->lister();
        $this->render('infirmier/soins_surveillance', compact('patients'));
    }

    public function signalement_urgence(): void {
        $this->gate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('infirmier/signalement_urgence'); }
            try {
                $_POST['infirmier_id'] = $this->infirmierId();
                $id = (new Urgence())->ajouter($_POST);
                $this->flash("🚨 Urgence #$id signalée.", 'warning');
            } catch (Throwable $e) {
                $this->flash("❌ " . $e->getMessage(), 'error');
            }
            $this->redirect('infirmier/signalement_urgence');
        }
        $patients = (new Patient())->lister();
        $medecins = (new Personnel())->listerMedecins();
        $this->render('infirmier/signalement_urgence', compact('patients','medecins'));
    }
}
