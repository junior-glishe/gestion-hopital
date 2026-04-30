<?php
/**
 * Configuration MediTrace.
 * Adaptez si nécessaire (XAMPP par défaut : root / mot de passe vide).
 */

// --- Base de données ---
define('DB_HOST', 'localhost');
define('DB_NAME', 'meditrace');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// --- Application ---
define('APP_NAME', 'MediTrace');
define('BASE_URL', 'index.php'); // utilisé pour générer les routes

// Affichage des erreurs (mettre 0 en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Fuseau horaire
date_default_timezone_set('Africa/Porto-Novo');
