<?php
return [
    // بيانات الاتصال بقاعدة البيانات المستخدمة داخل المشروع
    'db' => [
        'host' => 'localhost',
        'name' => 'personal_website',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8mb4',
    ],
    // الإعدادات العامة للموقع مثل اللغة الافتراضية والقالب
    'app' => [
        'default_language' => 'ar',
        'fallback_language' => 'en',
        'themes' => [
            'light' => 'theme-light',
            'dark' => 'theme-dark',
        ],
    ],
];
