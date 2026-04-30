<?php
class Urgence extends Model {
    public function lister(): array {
        return $this->db->query("SELECT * FROM urgences ORDER BY cree_le DESC")->fetchAll();
    }
    public function ajouter(array $d): int {
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
