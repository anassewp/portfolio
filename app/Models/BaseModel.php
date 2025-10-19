<?php
require_once __DIR__ . '/../../config/database.php';

/**
 * فئة أساسية للنماذج توفر العمليات الشائعة للتعامل مع قاعدة البيانات
 */
abstract class BaseModel
{
    /** @var \PDO */
    protected $db;

    public function __construct()
    {
        // حفظ اتصال قاعدة البيانات للاستخدام داخل النماذج
        $this->db = Database::connection();
    }
}
