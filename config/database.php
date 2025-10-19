<?php
/**
 * ملف مسؤول عن إنشاء اتصال PDO بقاعدة البيانات
 * يتم استدعاؤه من النماذج المختلفة لضمان نقطة اتصال واحدة
 */
class Database
{
    /** @var \PDO */
    protected static $connection;

    /**
     * إنشاء اتصال جديد أو إعادة الاتصال الموجود
     */
    public static function connection(): \PDO
    {
        if (!static::$connection) {
            $config = require __DIR__ . '/config.php';
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                $config['db']['host'],
                $config['db']['name'],
                $config['db']['charset']
            );

            try {
                static::$connection = new \PDO($dsn, $config['db']['user'], $config['db']['pass'], [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $exception) {
                die('خطأ في الاتصال بقاعدة البيانات: ' . $exception->getMessage());
            }
        }

        return static::$connection;
    }
}
