<?php

require_once __DIR__ . '/../models/Dosen.php';

class DosenController {
    
    public function index() {
        $dosenModel = new Dosen();
        $data = $dosenModel->getAll();
        require_once dirname(dirname(__DIR__)) . '/views/dosen/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaDosen = $_POST['namaDosen'] ?? '';
            $noHP = $_POST['noHP'] ?? '';

            $dosenModel = new Dosen();
            if ($dosenModel->create($namaDosen, $noHP)) {
                header("Location: index.php?page=dosen");
                exit();
            }
        }
        require_once dirname(dirname(__DIR__)) . '/views/dosen/create.php';
    }

    public function edit() {
        // Ambil ID dari parameter query string di URL (?page=dosen&action=edit&id=XX)
        $id = $_GET['id'] ?? null;
        $dosenModel = new Dosen();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaDosen = $_POST['namaDosen'] ?? '';
            $noHP = $_POST['noHP'] ?? '';

            if ($dosenModel->update($id, $namaDosen, $noHP)) {
                header("Location: index.php?page=dosen");
                exit();
            }
        }

        // Ambil record data dosen berdasarkan ID untuk di-render ke form edit
        $dosen = $dosenModel->getById($id);
        
        // Validasi jika data tidak ditemukan agar tidak merusak form view
        if (!$dosen) {
            die("Data dosen dengan ID tersebut tidak ditemukan.");
        }

        require_once dirname(dirname(__DIR__)) . '/views/dosen/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $dosenModel = new Dosen();
            $dosenModel->delete($id);
        }
        header("Location: index.php?page=dosen");
        exit();
    }
}
?>