<?php
class Ordonnance extends Model {
    public function lister(): array {
        $sql = "SELECT o.*, p.nom AS patient_nom, p.prenom AS patient_prenom
                FROM ordonnances o LEFT JOIN patients p ON p.id = o.patient_id
                ORDER BY o.date_emission DESC";
        return $this->db->query($sql)->fetchAll();
    }
    public function listerPourPatient(int $patientId): array {
        $st = $this->db->prepare("SELECT * FROM ordonnances WHERE patient_id = :p ORDER BY date_emission DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function ajouter(array $d): int {
        // Compose un contenu lisible à partir des champs du formulaire
        $contenu = $d['contenu'] ?? '';
        if (!$contenu) {
            $parts = [];
            for ($i = 1; $i <= 6; $i++) {
                if (!empty($d["medicament$i"])) {
                    $parts[] = "• " . $d["medicament$i"]
                        . (!empty($d["posologie$i"]) ? " — " . $d["posologie$i"] : '')
                        . (!empty($d["voie$i"])      ? " (" . $d["voie$i"] . ")" : '')
                        . (!empty($d["duree$i"])     ? " pendant " . $d["duree$i"] : '');
                }
            }
            if (!empty($d['instructions'])) $parts[] = "Instructions : " . $d['instructions'];
            $contenu = implode("\n", $parts);
        }

        $sql = "INSERT INTO ordonnances (consultation_id, patient_id, medecin_id, contenu)
                VALUES (:c, :p, :m, :contenu)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':c'       => !empty($d['consultation_id']) ? (int)$d['consultation_id'] : null,
            ':p'       => (int)($d['patient'] ?? $d['patient_id'] ?? 0),
            ':m'       => !empty($d['medecin_id']) ? (int)$d['medecin_id'] : null,
            ':contenu' => $contenu,
        ]);
        return (int) $this->db->lastInsertId();
    }
}
