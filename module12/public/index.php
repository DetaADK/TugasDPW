<?php

$baseDir = dirname(__DIR__);
require_once $baseDir . '/app/controllers/DashboardController.php';
require_once $baseDir . '/app/controllers/DosenController.php';
require_once $baseDir . '/app/controllers/MahasiswaController.php';
require_once $baseDir . '/app/controllers/MatkulController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {
    case 'dosen':
        $controller = new \DosenController();
        break;
    case 'mahasiswa':
        $controller = new \MahasiswaController();
        break;
    case 'matkul':
        $controller = new \MatkulController();
        break;
    default:
        $controller = new \DashboardController();
        $page = 'dashboard';
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}

?>