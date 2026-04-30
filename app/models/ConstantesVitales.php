<?php
class ConstantesVitales extends Model {
    public function listerPourPatient(int $patientId): array {
        $st = $this->db->prepare("SELECT * FROM constantes_vitales WHERE patient_id = :p ORDER BY date_mesure DESC");
        $st->execute([':p' => $patientId]);
        return $st->fetchAll();
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO constantes_vitales
                  (patient_id, infirmier_id, temperature, tension_systole, tension_diastole,
                   pouls, saturation, glycemie, poids, respiratoire, observations)
                VALUES (:p, :i, :temp, :ts, :td, :pls, :sat, :gly, :poids, :resp, :obs)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':p'     => (int)($d['patient'] ?? 0),
            ':i'     => !empty($d['infirmier_id']) ? (int)$d['infirmier_id'] : null,
            ':temp'  => $d['temperature'] !== '' ? $d['temperature'] : null,
            ':ts'    => $d['tension_systole'] !== '' ? (int)$d['tension_systole'] : null,
            ':td'    => $d['tension_diastole'] !== '' ? (int)$d['tension_diastole'] : null,
            ':pls'   => $d['pouls'] !== '' ? (int)$d['pouls'] : null,
            ':sat'   => $d['saturation'] !== '' ? (int)$d['saturation'] : null,
            ':gly'   => $d['glycemie'] !== '' ? $d['glycemie'] : null,
            ':poids' => $d['poids'] !== '' ? $d['poids'] : null,
            ':resp'  => $d['respiratoire'] !== '' ? (int)$d['respiratoire'] : null,
            ':obs'   => $d['observations'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
}
