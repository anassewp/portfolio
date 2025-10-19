<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج لإدارة آراء العملاء أو الزملاء
 */
class TestimonialModel extends BaseModel
{
    protected $table = 'testimonials';

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function save(array $data): bool
    {
        if (!empty($data['id'])) {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET author=:author, role=:role, message=:message WHERE id=:id");
            return $stmt->execute([
                ':author' => $data['author'],
                ':role' => $data['role'],
                ':message' => $data['message'],
                ':id' => $data['id'],
            ]);
        }

        $stmt = $this->db->prepare("INSERT INTO {$this->table} (author, role, message) VALUES (:author, :role, :message)");
        return $stmt->execute([
            ':author' => $data['author'],
            ':role' => $data['role'],
            ':message' => $data['message'],
        ]);
    }
}
