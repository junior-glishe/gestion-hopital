<?php
class Facture extends Model {
    public function lister(): array {
        $sql = "SELECT f.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM factures f LEFT JOIN patients p ON p.id = f.patient_id
                ORDER BY f.id DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerPourPatient(int $patientId): array {
        $st = $this->db->prepare("SELECT * FROM factures WHERE patient_id = :p ORDER BY id DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function listerImpayees(): array {
        return $this->db->query("SELECT f.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                                 FROM factures f LEFT JOIN patients p ON p.id = f.patient_id
                                 WHERE payee = 0 ORDER BY id DESC")->fetchAll();
    }
    public function trouver(int $id): ?array {
        $st = $this->db->prepare("SELECT * FROM factures WHERE id = :id");
        $st->execute([':id' => $id]);
        return $st->fetch() ?: null;
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO factures (patient_id, type_prestation, description, montant)
                VALUES (:p, :t, :desc, :m)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'    => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':t'    => $d['type_prestation'] ?? '',
            ':desc' => $d['description']     ?? '',
            ':m'    => (float)($d['montant'] ?? 0),
        ]);
        return (int) $this->db->lastInsertId();
    }
    public function marquerPayee(int $id): bool {
        return $this->db->prepare("UPDATE factures SET payee = 1 WHERE id = :id")->execute([':id' => $id]);
    }
    public function compter(): int {
        return (int) $this->db->query("SELECT COUNT(*) FROM factures")->fetchColumn();
    }
    public function totalMontant(): float {
        return (float) $this->db->query("SELECT COALESCE(SUM(montant),0) FROM factures")->fetchColumn();
    }
}
