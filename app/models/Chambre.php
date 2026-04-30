<?php
class Chambre extends Model {
    public function lister(): array {
        return $this->db->query("SELECT c.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                                 FROM chambres c LEFT JOIN patients p ON p.id = c.patient_id
                                 ORDER BY c.numero")->fetchAll();
    }
    public function listerLibres(): array {
        return $this->db->query("SELECT * FROM chambres WHERE occupee = 0 ORDER BY numero")->fetchAll();
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO chambres (numero, type, capacite, occupee) VALUES (:n, :t, :c, 0)";
        $st  = $this->db->prepare($sql);
        $st->execute([
            ':n' => $d['numero'] ?? '', ':t' => $d['type'] ?? 'Standard',
            ':c' => (int)($d['capacite'] ?? 1),
        ]);
        return (int) $this->db->lastInsertId();
    }
    public function affecter(int $chambreId, int $patientId): bool {
        return $this->db->prepare("UPDATE chambres SET occupee = 1, patient_id = :p WHERE id = :id")
                        ->execute([':p' => $patientId, ':id' => $chambreId]);
    }
    public function liberer(int $chambreId): bool {
        return $this->db->prepare("UPDATE chambres SET occupee = 0, patient_id = NULL WHERE id = :id")
                        ->execute([':id' => $chambreId]);
    }
}
