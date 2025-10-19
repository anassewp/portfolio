<?php
require_once __DIR__ . '/../app/Controllers/AdminController.php';

// التأكد من أن الطلب قادم عبر POST لحماية البيانات
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /admin.php');
    exit;
}

$controller = new AdminController();
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'updateUser':
        $controller->updateUser($_POST);
        break;
    case 'saveSkill':
        $controller->saveSkill($_POST);
        break;
    case 'saveProject':
        $controller->saveProject($_POST);
        break;
    case 'saveCertification':
        $controller->saveCertification($_POST);
        break;
    case 'saveTranslation':
        $controller->saveTranslation($_POST);
        break;
    case 'savePost':
        $controller->savePost($_POST);
        break;
    case 'saveTestimonial':
        $controller->saveTestimonial($_POST);
        break;
    default:
        header('Location: /admin.php?error=unknown_action');
}
