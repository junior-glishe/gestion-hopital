<?php
/**
 * Point d'entrée unique (Front Controller).
 * Toutes les requêtes passent par ce fichier.
 *
 * URL d'exemple :
 *   index.php                        -> Accueil
 *   index.php?p=connexion/login      -> Page de connexion
 *   index.php?p=medecin/dashboard    -> Dashboard médecin
 */

session_start();

require __DIR__ . '/config/config.php';
require __DIR__ . '/core/Database.php';
require __DIR__ . '/core/Controller.php';
require __DIR__ . '/core/Model.php';
require __DIR__ . '/core/View.php';
require __DIR__ . '/core/Router.php';

// Récupère la route demandée (ex: "medecin/dashboard")
$page = $_GET['p'] ?? 'accueil/index';

// Dispatch
Router::dispatch($page);
