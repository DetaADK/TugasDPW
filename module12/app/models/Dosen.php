<?php

require_once __DIR__ . '/../config/database.php';

class Dosen {
    private $conn;
    private $table = 'tbl_dosen';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // READ: Mengambil semua baris data dosen
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

    // READ SINGLE: Mencari satu data dosen berdasarkan idDosen
    public function getById($id) {
        // Melindungi data dari query string injection dasar menggunakan aman kustomisasi sanitasi atau casting
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $query = "SELECT * FROM " . $this->table . " WHERE idDosen = '$safe_id'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    // CREATE: Menyimpan entitas data dosen baru
    public function create($namaDosen, $noHP) {
        $nama = mysqli_real_escape_string($this->conn, $namaDosen);
        $hp = mysqli_real_escape_string($this->conn, $noHP);
        $query = "INSERT INTO " . $this->table . " (namaDosen, noHP) VALUES ('$nama', '$hp')";
        return mysqli_query($this->conn, $query);
    }

    // UPDATE: Memperbarui isi data dosen yang sudah ada
    public function update($id, $namaDosen, $noHP) {
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $nama = mysqli_real_escape_string($this->conn, $namaDosen);
        $hp = mysqli_real_escape_string($this->conn, $noHP);
        $query = "UPDATE " . $this->table . " SET namaDosen = '$nama', noHP = '$hp' WHERE idDosen = '$safe_id'";
        return mysqli_query($this->conn, $query);
    }

    // DELETE: Menghapus baris data dosen dari tabel
    public function delete($id) {
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $query = "DELETE FROM " . $this->table . " WHERE idDosen = '$safe_id'";
        return mysqli_query($this->conn, $query);
    }
}
?>