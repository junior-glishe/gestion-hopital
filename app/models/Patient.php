<?php
class Patient extends Model {

    public function lister(): array {
        return $this->db->query("SELECT * FROM patients ORDER BY id DESC")->fetchAll();
    }

    public function trouver(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM patients WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $r = $stmt->fetch();
        return $r ?: null;
    }

    public function trouverParUserId(int $userId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM patients WHERE user_id = :u LIMIT 1");
        $stmt->execute([':u' => $userId]);
        return $stmt->fetch() ?: null;
    }

    public function ajouter(array $d): int {
        $sexe = $d['sexe'] ?? $d['genre'] ?? 'M';
        if ($sexe === 'Homme') $sexe = 'M';
        if ($sexe === 'Femme') $sexe = 'F';

        $sql = "INSERT INTO patients
                  (user_id, nom, prenom, date_naissance, sexe, email, telephone, adresse, groupe_sanguin, contact_urgence)
                VALUES
                  (:user_id, :nom, :prenom, :ddn, :sexe, :email, :tel, :adr, :gs, :urg)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => !empty($d['user_id']) ? (int)$d['user_id'] : null,
            ':nom'     => trim($d['nom']    ?? ''),
            ':prenom'  => trim($d['prenom'] ?? ''),
            ':ddn'     => !empty($d['date_naissance']) ? $d['date_naissance'] : null,
            ':sexe'    => in_array($sexe, ['M','F']) ? $sexe : 'M',
            ':email'   => $d['email']            ?? null,
            ':tel'     => $d['telephone']        ?? null,
            ':adr'     => $d['adresse']          ?? null,
            ':gs'      => $d['groupe_sanguin']   ?? null,
            ':urg'     => $d['contact_urgence']  ?? null,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function compter(): int {
        return (int) $this->db->query("SELECT COUNT(*) FROM patients")->fetchColumn();
    }
}
