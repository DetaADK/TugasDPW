<?php
require_once __DIR__ . '/kelas/mahasiswa.php';

$mhs = new mahasiswa("Deta Aprilka Dario Karnavaro");
$mhs->setNIM("253307051");
$mhs->setJurusan("Teknologi Informasi");
$mhs->setKelas("2B");

echo "<h3>Data Mahasiswa</h3>";
echo "Nama: " . $mhs->getNama() . "<br>";
echo "NIM: " . $mhs->getNIM() . "<br>";
echo "Jurusan: " . $mhs->getJurusan() . "<br>";
echo "Kelas: " . $mhs->getKelas() . "<br>";
?>