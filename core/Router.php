<?php
/**
 * Routeur très simple.
 *
 * URL : index.php?p=<dossier>/<action>
 * Convention : <dossier> = nom du contrôleur (en minuscules)
 *              <action>  = méthode du contrôleur
 *
 * Exemple : index.php?p=medecin/dashboard
 *  -> instancie MedecinController, appelle ->dashboard()
 */
class Router {
    public static function dispatch(string $page): void {
        // Sécurité : on ne garde que des caractères simples
        $page = preg_replace('#[^a-zA-Z0-9/_]#', '', $page);
        $parts = explode('/', $page);

        $dossier = $parts[0] ?? 'accueil';
        $action  = $parts[1] ?? 'index';

        // Nom du fichier contrôleur : ex "medecin" -> MedecinController.php
        $controllerName = ucfirst($dossier) . 'Controller';
        $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            self::notFound("Contrôleur introuvable : $controllerName");
            return;
        }

        require $controllerFile;

        if (!class_exists($controllerName)) {
            self::notFound("Classe $controllerName absente");
            return;
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            self::notFound("Action $action introuvable dans $controllerName");
            return;
        }

        $controller->$action();
    }

    private static function notFound(string $msg = ''): void {
        http_response_code(404);
        View::render('erreurs/404', ['message' => $msg]);
    }
}
