<?php
class Paiement extends Model {
    public function lister(): array {
        return $this->db->query("SELECT pa.*, f.patient_id FROM paiements pa
                                 LEFT JOIN factures f ON f.id = pa.facture_id
                                 ORDER BY pa.date_paiement DESC")->fetchAll();
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO paiements (facture_id, montant, mode_paiement, reference, date_paiement)
                VALUES (:f, :m, :mp, :r, :dp)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':f'  => (int)($d['facture'] ?? $d['facture_id'] ?? 0),
            ':m'  => (float)($d['montant'] ?? 0),
            ':mp' => $d['mode_paiement'] ?? '',
            ':r'  => $d['reference'] ?? '',
            ':dp' => !empty($d['date_paiement']) ? $d['date_paiement'] : date('Y-m-d H:i:s'),
        ]);
        return (int) $this->db->lastInsertId();
    }
}
