<?php

require_once __DIR__ . '/../models/Dashboard.php';

class DashboardController {
    public function index() {
        $dashboard = new Dashboard();
        $countDosen = $dashboard->countDosen();
        $countMhs   = $dashboard->countMahasiswa();
        $countMK    = $dashboard->countMatkul();
        require_once dirname(dirname(__DIR__)) . '/views/dashboard/index.php';
    }
}
?>