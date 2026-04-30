<?php
class Personnel extends Model {
    public function lister(): array {
        return $this->db->query("SELECT * FROM personnel ORDER BY id DESC")->fetchAll();
    }
    public function listerMedecins(): array {
        return $this->db->query("SELECT * FROM personnel WHERE fonction LIKE '%edecin%' ORDER BY nom")->fetchAll();
    }
    public function trouver(int $id): ?array {
        $s = $this->db->prepare("SELECT * FROM personnel WHERE id = :id");
        $s->execute([':id' => $id]);
        return $s->fetch() ?: null;
    }
    public function trouverParEmail(string $email): ?array {
        $s = $this->db->prepare("SELECT * FROM personnel WHERE email = :e LIMIT 1");
        $s->execute([':e' => $email]);
        return $s->fetch() ?: null;
    }
    public function ajouter(array $d): int {
        $sql = "INSERT INTO personnel (nom, prenom, fonction, service, email, telephone)
                VALUES (:n, :p, :f, :s, :e, :t)";
        $st = $this->db->prepare($sql);
        $st->execute([
            ':n' => trim($d['nom'] ?? ''), ':p' => trim($d['prenom'] ?? ''),
            ':f' => $d['fonction'] ?? '',  ':s' => $d['service'] ?? '',
            ':e' => $d['email'] ?? '',     ':t' => $d['telephone'] ?? '',
        ]);
        return (int) $this->db->lastInsertId();
    }
    public function supprimer(int $id): bool {
        return $this->db->prepare("DELETE FROM personnel WHERE id = :id")->execute([':id' => $id]);
    }
    public function compter(): int {
        return (int) $this->db->query("SELECT COUNT(*) FROM personnel")->fetchColumn();
    }
}
