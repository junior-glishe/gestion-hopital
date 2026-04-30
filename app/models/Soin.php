<?php
class Soin extends Model
{
    public function lister(): array
    {
        $sql = "SELECT s.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM soins s LEFT JOIN patients p ON p.id = s.patient_id
                ORDER BY s.date_soin DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerRecents(int $limit = 5): array
    {
        return $this->db->query("SELECT s.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM soins s LEFT JOIN patients p ON p.id = s.patient_id
                ORDER BY s.date_soin DESC LIMIT " . (int)$limit)->fetchAll();
    }
    public function compter(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM soins")->fetchColumn();
    }
    public function ajouter(array $d): int
    {
        $proch = null;
        if (!empty($d['date']) && !empty($d['prochain_heure'])) {
            $proch = $d['date'] . ' ' . $d['prochain_heure'];
        }
        $sql = "INSERT INTO soins (patient_id, infirmier_id, type_soin, description, observation, prochain_soin)
                VALUES (:p, :i, :t, :desc, :obs, :proch)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'     => (int)($d['patient'] ?? 0),
            ':i'     => !empty($d['infirmier_id']) ? (int)$d['infirmier_id'] : null,
            ':t'     => $d['type_soin']    ?? '',
            ':desc'  => $d['description']  ?? '',
            ':obs'   => $d['observation']  ?? '',
            ':proch' => $proch,
        ]);
        return (int) $this->db->lastInsertId();
    }
}
