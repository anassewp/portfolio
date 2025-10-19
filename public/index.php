<?php
require_once __DIR__ . '/../app/Controllers/HomeController.php';

// تحديد اللغة بناءً على طلب المستخدم أو الإعداد الافتراضي
$config = require __DIR__ . '/../config/config.php';
$lang = $_GET['lang'] ?? $config['app']['default_language'];
$lang = in_array($lang, ['ar', 'en']) ? $lang : $config['app']['fallback_language'];

$controller = new HomeController();
$controller->index($lang);
