<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج لإدارة المشاريع والأعمال السابقة
 */
class ProjectModel extends BaseModel
{
    protected $table = 'projects';

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function save(array $data): bool
    {
        if (!empty($data['id'])) {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET title=:title, description=:description, link=:link, image=:image WHERE id=:id");
            return $stmt->execute([
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':link' => $data['link'],
                ':image' => $data['image'],
                ':id' => $data['id'],
            ]);
        }

        $stmt = $this->db->prepare("INSERT INTO {$this->table} (title, description, link, image) VALUES (:title, :description, :link, :image)");
        return $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':link' => $data['link'],
            ':image' => $data['image'],
        ]);
    }
}
