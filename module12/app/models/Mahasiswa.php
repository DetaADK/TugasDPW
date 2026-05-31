<?php

require_once __DIR__ . '/../config/database.php';

class Mahasiswa {
    private $conn;
    private $table = 'tbl_mahasiswa';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // READ ALL
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = mysqli_query($this->conn, $query);
        $data = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // READ SINGLE (Berdasarkan NPM)
    public function getByNpm($npm) {
        $safe_npm = mysqli_real_escape_string($this->conn, $npm);
        $query = "SELECT * FROM " . $this->table . " WHERE npm = '$safe_npm'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    // CREATE
    public function create($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $safe_npm = mysqli_real_escape_string($this->conn, $npm);
        $safe_nama = mysqli_real_escape_string($this->conn, $namaMhs);
        $safe_prodi = mysqli_real_escape_string($this->conn, $prodi);
        $safe_alamat = mysqli_real_escape_string($this->conn, $alamat);
        $safe_hp = mysqli_real_escape_string($this->conn, $noHP);

        $query = "INSERT INTO " . $this->table . " (npm, namaMhs, prodi, alamat, noHP) 
                  VALUES ('$safe_npm', '$safe_nama', '$safe_prodi', '$safe_alamat', '$safe_hp')";
        return mysqli_query($this->conn, $query);
    }

    // UPDATE
    public function update($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $safe_npm = mysqli_real_escape_string($this->conn, $npm);
        $safe_nama = mysqli_real_escape_string($this->conn, $namaMhs);
        $safe_prodi = mysqli_real_escape_string($this->conn, $prodi);
        $safe_alamat = mysqli_real_escape_string($this->conn, $alamat);
        $safe_hp = mysqli_real_escape_string($this->conn, $noHP);

        $query = "UPDATE " . $this->table . " 
                  SET namaMhs = '$safe_nama', prodi = '$safe_prodi', alamat = '$safe_alamat', noHP = '$safe_hp' 
                  WHERE npm = '$safe_npm'";
        return mysqli_query($this->conn, $query);
    }

    // DELETE
    public function delete($npm) {
        $safe_npm = mysqli_real_escape_string($this->conn, $npm);
        $query = "DELETE FROM " . $this->table . " WHERE npm = '$safe_npm'";
        return mysqli_query($this->conn, $query);
    }
}
?>