<?php

class Database {

    // property koneksi
    private $host = "localhost";
    private $user = "deta";
    private $password = "deta1234";
    private $database = "akademik";

    // property untuk menyimpan koneksi
    public $conn;

    // method koneksi
    public function connect() {

        $this->conn = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        // cek koneksi
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        return $this->conn;
    }
}
?>