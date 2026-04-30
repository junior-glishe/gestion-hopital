<?php
require_once __DIR__ . '/../models/Utilisateur.php';
require_once __DIR__ . '/../models/Patient.php';

class ConnexionController extends Controller {

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('connexion/login'); }
            $email    = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role     = $_POST['role'] ?? '';

            $user = (new Utilisateur())->verifierConnexion($email, $password, $role);
            if ($user) {
                $_SESSION['user'] = $user;
                $this->flash("Bienvenue " . $user['nom'] . " !", 'success');
                $this->redirect($user['role'] . '/dashboard');
            }
            $this->flash("Email, mot de passe ou rôle incorrect.", 'error');
            $this->redirect('connexion/login');
        }
        $this->render('connexion/login');
    }

    public function inscription(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->checkCsrf()) { $this->redirect('connexion/inscription'); }

            $nom      = trim(($_POST['prenom'] ?? '') . ' ' . ($_POST['nom'] ?? ''));
            $email    = trim($_POST['email'] ?? '');
            $password = $_POST['mot_de_passe'] ?? $_POST['password'] ?? '';
            $confirm  = $_POST['confirm_password'] ?? '';
            $role     = $_POST['role'] ?? 'patient';

            if (!$nom || !$email || !$password) {
                $this->flash("Tous les champs marqués * sont obligatoires.", 'error');
                $this->redirect('connexion/inscription');
            }
            if ($password !== $confirm) {
                $this->flash("Les mots de passe ne correspondent pas.", 'error');
                $this->redirect('connexion/inscription');
            }
            if (strlen($password) < 6) {
                $this->flash("Le mot de passe doit contenir au moins 6 caractères.", 'error');
                $this->redirect('connexion/inscription');
            }

            $userModel = new Utilisateur();
            if ($userModel->trouverParEmail($email)) {
                $this->flash("Cet email est déjà utilisé.", 'error');
                $this->redirect('connexion/inscription');
            }

            try {
                $userId = $userModel->creer($nom, $email, $password, $role);
                if ($role === 'patient') {
                    (new Patient())->ajouter([
                        'user_id'         => $userId,
                        'nom'             => $_POST['nom']    ?? '',
                        'prenom'          => $_POST['prenom'] ?? '',
                        'date_naissance'  => $_POST['date_naissance'] ?? null,
                        'sexe'            => $_POST['sexe'] ?? $_POST['genre'] ?? 'M',
                        'email'           => $email,
                        'telephone'       => $_POST['telephone'] ?? '',
                        'adresse'         => $_POST['adresse']   ?? '',
                        'groupe_sanguin'  => $_POST['groupe_sanguin'] ?? null,
                        'contact_urgence' => $_POST['contact_urgence'] ?? null,
                    ]);
                }
                $this->flash("✅ Compte créé avec succès. Vous pouvez vous connecter.", 'success');
                $this->redirect('connexion/login');
            } catch (Throwable $e) {
                $this->flash("Erreur lors de la création : " . $e->getMessage(), 'error');
                $this->redirect('connexion/inscription');
            }
        }
        $this->render('connexion/inscription');
    }

    public function forgot(): void          { $this->render('connexion/forgot'); }
    public function reset_password(): void  { $this->render('connexion/reset_password'); }

    public function logout(): void {
        $_SESSION = [];
        session_destroy();
        session_start();
        $this->flash("Vous êtes déconnecté(e).", 'info');
        $this->redirect('connexion/login');
    }

    /**
     * Réinitialise les mots de passe des comptes démo avec de vrais hashes.
     * À utiliser une fois après import du SQL : ?p=connexion/seed
     */
    public function seed(): void {
        $u = new Utilisateur();
        $comptes = [
            'admin@hopital.com'      => 'admin123',
            'dr.kpossou@hopital.com' => 'medecin123',
            'inf.glele@hopital.com'  => 'infirmier123',
            'patient@test.com'       => 'patient123',
        ];
        $ok = 0;
        foreach ($comptes as $email => $pwd) {
            $row = $u->trouverParEmail($email);
            if ($row && $u->majMotDePasse((int)$row['id'], $pwd)) { $ok++; }
        }
        $this->flash("$ok mot(s) de passe démo réinitialisé(s) avec succès.", 'success');
        $this->redirect('connexion/login');
    }
}
