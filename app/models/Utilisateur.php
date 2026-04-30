<?php
class Utilisateur extends Model {

    public function verifierConnexion(string $email, string $password, string $role): ?array {
        $sql = "SELECT id, nom, email, mot_de_passe, role
                FROM utilisateurs
                WHERE email = :email AND role = :role
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email, ':role' => $role]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            unset($user['mot_de_passe']);
            return $user;
        }
        return null;
    }

    public function trouverParEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = :e LIMIT 1");
        $stmt->execute([':e' => $email]);
        return $stmt->fetch() ?: null;
    }

    public function creer(string $nom, string $email, string $password, string $role): int {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe, role)
                VALUES (:nom, :email, :mdp, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nom' => $nom, ':email' => $email, ':mdp' => $hash, ':role' => $role]);
        return (int) $this->db->lastInsertId();
    }

    public function majMotDePasse(int $id, string $newPassword): bool {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->db->prepare("UPDATE utilisateurs SET mot_de_passe = :p WHERE id = :id")
                        ->execute([':p' => $hash, ':id' => $id]);
    }
}
