<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج لإدارة مقالات المدونة
 */
class BlogModel extends BaseModel
{
    protected $table = 'posts';

    public function getPublished(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE published = 1 ORDER BY published_at DESC");
        return $stmt->fetchAll();
    }

    public function save(array $data): bool
    {
        if (!empty($data['id'])) {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET title=:title, excerpt=:excerpt, content=:content, published=:published WHERE id=:id");
            return $stmt->execute([
                ':title' => $data['title'],
                ':excerpt' => $data['excerpt'],
                ':content' => $data['content'],
                ':published' => $data['published'] ?? 0,
                ':id' => $data['id'],
            ]);
        }

        $stmt = $this->db->prepare("INSERT INTO {$this->table} (title, excerpt, content, published, published_at) VALUES (:title, :excerpt, :content, :published, NOW())");
        return $stmt->execute([
            ':title' => $data['title'],
            ':excerpt' => $data['excerpt'],
            ':content' => $data['content'],
            ':published' => $data['published'] ?? 0,
        ]);
    }
}
