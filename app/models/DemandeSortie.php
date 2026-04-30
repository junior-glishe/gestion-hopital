<?php
class DemandeSortie extends Model {
    public function ajouter(array $d): int {
        $sql = "INSERT INTO demandes_sortie (patient_id, date_sortie, motif)
                VALUES (:p, :ds, :m)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'  => (int)($d['patient_id'] ?? 0),
            ':ds' => $d['date_sortie'] ?: date('Y-m-d H:i:s'),
            ':m'  => $d['motif'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
