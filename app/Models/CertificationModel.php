<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج للتعامل مع الشهادات والدورات التدريبية
 */
class CertificationModel extends BaseModel
{
    protected $table = 'certifications';

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY obtained_at DESC");
        return $stmt->fetchAll();
    }

    public function save(array $data): bool
    {
        if (!empty($data['id'])) {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET name=:name, provider=:provider, score=:score, obtained_at=:obtained_at WHERE id=:id");
            return $stmt->execute([
                ':name' => $data['name'],
                ':provider' => $data['provider'],
                ':score' => $data['score'],
                ':obtained_at' => $data['obtained_at'],
                ':id' => $data['id'],
            ]);
        }

        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, provider, score, obtained_at) VALUES (:name, :provider, :score, :obtained_at)");
        return $stmt->execute([
            ':name' => $data['name'],
            ':provider' => $data['provider'],
            ':score' => $data['score'],
            ':obtained_at' => $data['obtained_at'],
        ]);
    }
}
