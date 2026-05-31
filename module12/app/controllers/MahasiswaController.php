<?php

require_once __DIR__ . '/../models/Mahasiswa.php';

class MahasiswaController {
    
    public function index() {
        $mahasiswaModel = new Mahasiswa();
        $data = $mahasiswaModel->getAll();
        require_once dirname(dirname(__DIR__)) . '/views/mahasiswa/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $npm = $_POST['npm'] ?? '';
            $namaMhs = $_POST['namaMhs'] ?? '';
            $prodi = $_POST['prodi'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $noHP = $_POST['noHP'] ?? '';

            $mahasiswaModel = new Mahasiswa();
            if ($mahasiswaModel->create($npm, $namaMhs, $prodi, $alamat, $noHP)) {
                header("Location: index.php?page=mahasiswa");
                exit();
            }
        }
        require_once dirname(dirname(__DIR__)) . '/views/mahasiswa/create.php';
    }

    public function edit() {
        $npm = $_GET['id'] ?? null; // Menangkap parameter 'id' dari URL router
        $mahasiswaModel = new Mahasiswa();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaMhs = $_POST['namaMhs'] ?? '';
            $prodi = $_POST['prodi'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $noHP = $_POST['noHP'] ?? '';

            if ($mahasiswaModel->update($npm, $namaMhs, $prodi, $alamat, $noHP)) {
                header("Location: index.php?page=mahasiswa");
                exit();
            }
        }

        $mahasiswa = $mahasiswaModel->getByNpm($npm);
        if (!$mahasiswa) {
            die("Data mahasiswa dengan NPM tersebut tidak ditemukan.");
        }

        require_once dirname(dirname(__DIR__)) . '/views/mahasiswa/edit.php';
    }

    public function delete() {
        $npm = $_GET['id'] ?? null;
        if ($npm) {
            $mahasiswaModel = new Mahasiswa();
            $mahasiswaModel->delete($npm);
        }
        header("Location: index.php?page=mahasiswa");
        exit();
    }
}
?>