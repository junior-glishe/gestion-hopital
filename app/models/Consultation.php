<?php
class Consultation extends Model {
    public function lister(): array {
        $sql = "SELECT c.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM consultations c LEFT JOIN patients p ON p.id = c.patient_id
                ORDER BY c.date_consultation DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerPourPatient(int $patientId): array {
        $st = $this->db->prepare("SELECT * FROM consultations WHERE patient_id = :p ORDER BY date_consultation DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO consultations (patient_id, medecin_id, type_diagnostic, diagnostic, observations)
                VALUES (:p, :m, :td, :diag, :obs)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'    => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':m'    => !empty($d['medecin_id']) ? (int)$d['medecin_id'] : null,
            ':td'   => $d['type_diagnostic'] ?? null,
            ':diag' => $d['diagnostic']      ?? '',
            ':obs'  => $d['observations'] ?? $d['notes'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
