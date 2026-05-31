<?php

require_once __DIR__ . '/../models/Matkul.php';

class MatkulController {
    
    public function index() {
        $matkulModel = new Matkul();
        $data = $matkulModel->getAll();
        require_once dirname(dirname(__DIR__)) . '/views/matkul/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaMK = $_POST['namaMK'] ?? '';
            $sks = $_POST['sks'] ?? '';

            $matkulModel = new Matkul();
            if ($matkulModel->create($namaMK, $sks)) {
                header("Location: index.php?page=matkul");
                exit();
            }
        }
        require_once dirname(dirname(__DIR__)) . '/views/matkul/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null; 
        $matkulModel = new Matkul();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaMK = $_POST['namaMK'] ?? '';
            $sks = $_POST['sks'] ?? '';

            if ($matkulModel->update($id, $namaMK, $sks)) {
                header("Location: index.php?page=matkul");
                exit();
            }
        }

        $matkul = $matkulModel->getById($id);
        if (!$matkul) {
            die("Data Mata Kuliah tidak ditemukan di database.");
        }

        require_once dirname(dirname(__DIR__)) . '/views/matkul/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $matkulModel = new Matkul();
            $matkulModel->delete($id);
        }
        header("Location: index.php?page=matkul");
        exit();
    }
}
?>