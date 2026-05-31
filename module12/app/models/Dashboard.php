<?php

require_once __DIR__ . '/../config/database.php';

class Dashboard {

    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    public function countDosen() {
        $query = "SELECT COUNT(*) as total FROM tbl_dosen";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function countMahasiswa() {
        $query = "SELECT COUNT(*) as total FROM tbl_mahasiswa";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    public function countMatkul() {
        $query = "SELECT COUNT(*) as total FROM tbl_matakuliah";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
}
?>