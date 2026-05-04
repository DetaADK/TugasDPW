<?php
require_once ('kelas/manusia.php');

$andi = new manusia();
$andi->setNama("Deta Aprilka Dario Karnavaro");
$andi->setUmur(20);

$budi = new manusia();
$budi->setNama("Gavin Naufal");
$budi->setUmur(22);

echo "Identitas Budi:<br>";
echo "Nama: " . $budi->getNama() . "<br>";

echo "<br>Identitas Anda:<br>";
echo "Nama: " . $andi->getNama() . "<br>";
echo "Umur: " . $andi->getUmur() . " tahun<br>";
echo "NIK: " . $andi->getNIK() . "<br>";
?>