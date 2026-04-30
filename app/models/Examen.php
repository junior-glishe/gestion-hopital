<?php
class Examen extends Model
{
    public function lister(): array
    {
        $sql = "SELECT e.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM examens e LEFT JOIN patients p ON p.id = e.patient_id
                ORDER BY e.date_demande DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerRecents(int $limit = 5): array
    {
        return $this->db->query("SELECT e.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM examens e LEFT JOIN patients p ON p.id = e.patient_id
                WHERE e.statut = 'en_attente' OR e.statut IS NULL
                ORDER BY e.date_demande DESC LIMIT " . (int)$limit)->fetchAll();
    }
    public function listerPourPatient(int $patientId): array
    {
        $st = $this->db->prepare("SELECT * FROM examens WHERE patient_id = :p ORDER BY date_demande DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function ajouter(array $d): int
    {
        $type = $d['examen1'] ?? $d['examen'] ?? $d['type_examen'] ?? '';
        $date = $d['date_examen1'] ?? $d['date_examen'] ?? null;
        $sql = "INSERT INTO examens (patient_id, medecin_id, type_examen, indications, date_examen)
                VALUES (:p, :m, :t, :i, :d)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p' => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':m' => !empty($d['medecin_id']) ? (int)$d['medecin_id'] : null,
            ':t' => $type,
            ':i' => $d['indications1'] ?? $d['indications'] ?? '',
            ':d' => $date ?: null,
        ]);
        return (int) $this->db->lastInsertId();
    }
    public function ajouterInterpretation(array $d): int
    {
        $resultat = "Rythme : " . ($d['rythme'] ?? '') . "\n"
            . "Fréquence : " . ($d['frequence'] ?? '') . "\n"
            . "Onde P : " . ($d['onde_p'] ?? '') . " | PR : " . ($d['pr'] ?? '')
            . " | QRS : " . ($d['qrs'] ?? '') . " | ST : " . ($d['st'] ?? '') . "\n"
            . "Interprétation : " . ($d['interpretation'] ?? '') . "\n"
            . "Conclusion : " . ($d['conclusion'] ?? '');
        $sql = "INSERT INTO examens (patient_id, medecin_id, type_examen, resultat, statut)
                VALUES (:p, :m, 'ECG', :r, 'interprete')";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p' => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':m' => !empty($d['medecin_id']) ? (int)$d['medecin_id'] : null,
            ':r' => $resultat,
        ]);
        return (int) $this->db->lastInsertId();
    }
}
