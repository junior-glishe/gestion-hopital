<?php
class RendezVous extends Model {
    public function lister(): array {
        $sql = "SELECT r.*, p.nom AS patient_nom, p.prenom AS patient_prenom,
                       per.nom AS medecin_nom, per.prenom AS medecin_prenom
                FROM rendez_vous r
                LEFT JOIN patients p   ON p.id = r.patient_id
                LEFT JOIN personnel per ON per.id = r.medecin_id
                ORDER BY r.date_rdv DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerPourPatient(int $patientId): array {
        $st = $this->db->prepare("SELECT r.*, per.nom AS medecin_nom, per.prenom AS medecin_prenom
                                  FROM rendez_vous r
                                  LEFT JOIN personnel per ON per.id = r.medecin_id
                                  WHERE r.patient_id = :p ORDER BY r.date_rdv DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function ajouter(array $d): int {
        $date  = !empty($d['date']) ? $d['date'] : '';
        $heure = !empty($d['heure']) ? $d['heure'] : '00:00';
        $datetime = $d['date_rdv'] ?? trim($date . ' ' . $heure);

        $sql = "INSERT INTO rendez_vous (patient_id, medecin_id, date_rdv, motif)
                VALUES (:p, :m, :d, :motif)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'     => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':m'     => !empty($d['medecin']) ? (int)$d['medecin'] : (!empty($d['medecin_id']) ? (int)$d['medecin_id'] : null),
            ':d'     => $datetime ?: date('Y-m-d H:i:s'),
            ':motif' => $d['motif'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
