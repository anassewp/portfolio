<?php
require_once __DIR__ . '/BaseModel.php';

/**
 * نموذج لإدارة الترجمات بين اللغتين العربية والإنجليزية
 */
class LanguageModel extends BaseModel
{
    protected $table = 'translations';

    public function getTranslations(string $language): array
    {
        $stmt = $this->db->prepare("SELECT translation_key, translation_value FROM {$this->table} WHERE language = :language");
        $stmt->execute([':language' => $language]);
        $translations = [];
        foreach ($stmt->fetchAll() as $row) {
            $translations[$row['translation_key']] = $row['translation_value'];
        }
        return $translations;
    }

    public function saveTranslation(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table} (translation_key, language, translation_value) VALUES (:key, :language, :value)
             ON DUPLICATE KEY UPDATE translation_value = VALUES(translation_value)"
        );
        return $stmt->execute([
            ':key' => $data['translation_key'],
            ':language' => $data['language'],
            ':value' => $data['translation_value'],
        ]);
    }
}
