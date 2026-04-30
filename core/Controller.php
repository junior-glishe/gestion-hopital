<?php
/**
 * Contrôleur de base.
 * Fournit : render(), redirect(), requireRole(), flash(), csrf().
 */
class Controller {

    /** Affiche une vue. Les flash et csrf sont injectés automatiquement. */
    protected function render(string $vue, array $data = []): void {
        $data['flash']      = $this->popFlash();
        $data['csrf_token'] = $this->csrfToken();
        $data['user']       = $_SESSION['user'] ?? null;
        View::render($vue, $data);
    }

    /** Redirige vers une route interne (?p=dossier/action). */
    protected function redirect(string $page): void {
        if ($page === '' || $page === 'accueil') {
            header("Location: index.php");
        } else {
            header("Location: index.php?p=" . $page);
        }
        exit;
    }

    /** Vérifie qu'un utilisateur est connecté avec le bon rôle. */
    protected function requireRole(string $role): void {
        if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== $role) {
            $this->flash("Accès refusé. Connectez-vous en tant que $role.", 'error');
            $this->redirect('connexion/login');
        }
    }

    /** Stocke un message flash pour la prochaine page. */
    protected function flash(string $message, string $type = 'success'): void {
        $_SESSION['_flash'][] = ['message' => $message, 'type' => $type];
    }

    /** Récupère et vide les flash messages. */
    private function popFlash(): array {
        $f = $_SESSION['_flash'] ?? [];
        unset($_SESSION['_flash']);
        return $f;
    }

    /** Génère / récupère le token CSRF. */
    protected function csrfToken(): string {
        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf'];
    }

    /** Vérifie le token CSRF du formulaire. */
    protected function checkCsrf(): bool {
        $sent = $_POST['_csrf'] ?? '';
        $ref  = $_SESSION['_csrf'] ?? '__nope__';
        if (!hash_equals($ref, $sent)) {
            $this->flash("Session expirée, merci de réessayer.", 'error');
            return false;
        }
        return true;
    }

    /** Helper : vrai si la requête actuelle est un POST valide (CSRF inclus). */
    protected function isPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST' && $this->checkCsrf();
    }
}
