<?php
class DemandeConsultation extends Model {
    public function lister(): array {
        $sql = "SELECT d.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM demandes_consultation d LEFT JOIN patients p ON p.id = d.patient_id
                ORDER BY d.cree_le DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO demandes_consultation (patient_id, service, motif)
                VALUES (:p, :s, :m)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p' => (int)($d['patient_id'] ?? 0),
            ':s' => $d['service'] ?? '',
            ':m' => $d['motif']   ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
