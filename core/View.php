<?php
/**
 * Système d'affichage des vues.
 *
 * Une vue est un simple fichier .php placé dans /app/views/<dossier>/<nom>.php.
 * Le layout principal (header/footer commun) est /app/views/layouts/main.php.
 */
class View {
    public static function render(string $vue, array $data = []): void {
        $chemin = __DIR__ . '/../app/views/' . $vue . '.php';

        if (!file_exists($chemin)) {
            http_response_code(404);
            $chemin = __DIR__ . '/../app/views/erreurs/404.php';
        }

        // Les clés de $data deviennent des variables dans la vue
        extract($data);

        require $chemin;
    }
}
