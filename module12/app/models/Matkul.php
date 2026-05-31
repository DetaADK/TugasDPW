<?php

require_once __DIR__ . '/../config/database.php';

class Matkul {
    private $conn;
    private $table = 'tbl_matakuliah';

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

    public function getById($id) {
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $query = "SELECT * FROM " . $this->table . " WHERE kodeMK = '$safe_id'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function create($namaMatkul, $sks) {
        $nama = mysqli_real_escape_string($this->conn, $namaMatkul);
        $sks_safe = mysqli_real_escape_string($this->conn, $sks);
        $query = "INSERT INTO " . $this->table . " (namaMK, sks) VALUES ('$nama', '$sks_safe')";
        return mysqli_query($this->conn, $query);
    }

    public function update($id, $namaMatkul, $sks) {
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $nama = mysqli_real_escape_string($this->conn, $namaMatkul);
        $sks_safe = mysqli_real_escape_string($this->conn, $sks);
        $query = "UPDATE " . $this->table . " SET namaMK = '$nama', sks = '$sks_safe' WHERE kodeMK = '$safe_id'";
        return mysqli_query($this->conn, $query);
    }

    public function delete($id) {
        $safe_id = mysqli_real_escape_string($this->conn, $id);
        $query = "DELETE FROM " . $this->table . " WHERE kodeMK = '$safe_id'";
        return mysqli_query($this->conn, $query);
    }
}
?>