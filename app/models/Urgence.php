<?php
class Urgence extends Model
{
    public function lister(): array
    {
        return $this->db->query("SELECT * FROM urgences ORDER BY cree_le DESC")->fetchAll();
    }
    public function listerRecentes(int $limit = 5): array
    {
        return $this->db->query("SELECT u.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM urgences u LEFT JOIN patients p ON p.id = u.patient_id
                ORDER BY u.cree_le DESC LIMIT " . (int)$limit)->fetchAll();
    }
    public function compterEnAttente(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM urgences WHERE statut = 'en_attente' OR statut IS NULL")->fetchColumn();
    }
    public function ajouter(array $d): int
    {
        $sql = "INSERT INTO urgences (patient_id, infirmier_id, medecin_id, niveau, description, action)
                VALUES (:p, :i, :m, :n, :desc, :act)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'    => (int)($d['patient'] ?? 0),
            ':i'    => !empty($d['infirmier_id']) ? (int)$d['infirmier_id'] : null,
            ':m'    => !empty($d['medecin']) ? (int)$d['medecin'] : null,
            ':n'    => $d['niveau']      ?? 'moyen',
            ':desc' => $d['description'] ?? '',
            ':act'  => $d['action']      ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
