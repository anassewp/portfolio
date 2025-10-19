<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج للتعامل مع بيانات المستخدم الأساسية وعرضها في الواجهة العامة ولوحة التحكم
 */
class UserModel extends BaseModel
{
    protected $table = 'user_data';

    /**
     * جلب بيانات المستخدم الفردية
     */
    public function getUser(): ?array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} LIMIT 1");
        $data = $stmt->fetch();
        return $data ?: null;
    }

    /**
     * تحديث بيانات المستخدم الرئيسية
     */
    public function updateUser(array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name=:name, title=:title, bio=:bio, email=:email, phone=:phone WHERE id=:id");
        return $stmt->execute([
            ':name' => $data['name'],
            ':title' => $data['title'],
            ':bio' => $data['bio'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':id' => $data['id'],
        ]);
    }
}
