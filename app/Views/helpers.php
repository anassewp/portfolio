<?php
/**
 * دالة مساعدة لاسترجاع الترجمة بناءً على المفتاح الحالي
 */
function __t(array $translations, string $key, string $default): string
{
    return $translations[$key] ?? $default;
}
