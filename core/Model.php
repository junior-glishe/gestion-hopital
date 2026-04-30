<?php
/**
 * Modèle de base.
 * Donne accès à la connexion PDO via $this->db.
 */
class Model {
    protected PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }
}
