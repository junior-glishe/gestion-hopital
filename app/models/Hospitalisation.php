<?php
class Hospitalisation extends Model
{
    public function lister(): array
    {
        $sql = "SELECT h.*, p.nom AS patient_nom, p.prenom AS patient_prenom, c.numero AS chambre_numero
                FROM hospitalisations h
                LEFT JOIN patients p ON p.id = h.patient_id
                LEFT JOIN chambres c ON c.id = h.chambre_id
                ORDER BY h.date_admission DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerEnCours(): array
    {
        return $this->db->query("SELECT h.*, p.nom AS patient_nom, p.prenom AS patient_prenom, c.numero AS chambre_numero
                FROM hospitalisations h
                LEFT JOIN patients p ON p.id = h.patient_id
                LEFT JOIN chambres c ON c.id = h.chambre_id
                WHERE h.statut = 'en_cours' OR h.statut IS NULL
                ORDER BY h.date_admission DESC")->fetchAll();
    }
    public function compter(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM hospitalisations WHERE statut = 'en_cours' OR statut IS NULL")->fetchColumn();
    }
    public function ajouter(array $d): int
    {
        $sql = "INSERT INTO hospitalisations (patient_id, medecin_id, chambre_id, date_admission, motif, diagnostic)
                VALUES (:p, :m, :c, :da, :motif, :diag)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'     => (int)($d['patient'] ?? 0),
            ':m'     => !empty($d['medecin_id']) ? (int)$d['medecin_id'] : null,
            ':c'     => !empty($d['chambre']) ? (int)$d['chambre'] : null,
            ':da'    => $d['date_admission'] ?: date('Y-m-d H:i:s'),
            ':motif' => $d['motif'] ?? '',
            ':diag'  => $d['diagnostic'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
    public function autoriserSortie(int $patientId, string $dateSortie, string $observations = ''): bool
    {
        $sql = "UPDATE hospitalisations
                SET date_sortie = :ds, statut = 'sortie',
                    diagnostic = CONCAT(IFNULL(diagnostic,''), '\n[Sortie] ', :obs)
                WHERE patient_id = :p AND statut = 'en_cours'";
        return $this->db->prepare($sql)->execute([
            ':ds' => $dateSortie,
            ':obs' => $observations,
            ':p' => $patientId
        ]);
    }
}
