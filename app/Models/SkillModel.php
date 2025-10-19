<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج لإدارة المهارات الفنية والمهارات الشخصية
 */
class SkillModel extends BaseModel
{
    protected $table = 'skills';

    /**
     * جلب المهارات حسب نوعها الفني أو الشخصي
     */
    public function getSkillsByType(string $type): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE skill_type = :type ORDER BY id ASC");
        $stmt->execute([':type' => $type]);
        return $stmt->fetchAll();
    }

    /**
     * إضافة مهارة جديدة
     */
    public function createSkill(array $data): bool
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (skill_name, skill_type, level) VALUES (:name, :type, :level)");
        return $stmt->execute([
            ':name' => $data['skill_name'],
            ':type' => $data['skill_type'],
            ':level' => $data['level'] ?? null,
        ]);
    }

    /**
     * تحديث مهارة موجودة
     */
    public function updateSkill(array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET skill_name=:name, skill_type=:type, level=:level WHERE id=:id");
        return $stmt->execute([
            ':name' => $data['skill_name'],
            ':type' => $data['skill_type'],
            ':level' => $data['level'] ?? null,
            ':id' => $data['id'],
        ]);
    }
}
