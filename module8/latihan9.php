<?php

// Contoh fungsi sederhana
function writeMsg($nama) {
    echo "Selamat datang " . $nama . "<br>";
}

// Pemanggilan fungsi
writeMsg("Ahmad"); 

echo "<hr>";

// Fungsi dengan mengirim nilai balik (return)
function tambah(int $angka1, int $angka2) {
    $a = $angka1 + $angka2;
    return $a; // Mengirim nilai $a ke pemanggil
}

// Pemanggilan fungsi dengan nilai balik
$hasil = tambah(5, 5);
echo "Hasil penjumlahan: " . $hasil;

?>