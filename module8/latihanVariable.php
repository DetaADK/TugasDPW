<?php
// 1. Mendefinisikan variabel array yang berisi 7 nama hari
$nama_hari = [
    "Senin", 
    "Selasa", 
    "Rabu", 
    "Kamis", 
    "Jumat", 
    "Sabtu", 
    "Minggu"
];

echo "<h2>Daftar Nama Hari dalam Seminggu:</h2>";

// 2. Menampilkan nama hari menggunakan mekanisme perulangan (foreach)
echo "<ul>";
foreach ($nama_hari as $hari) {
    echo "<li>Hari ini adalah hari: <b>$hari</b></li>";
}
echo "</ul>";

echo "<hr>";

// 3. Contoh menampilkan hari tertentu berdasarkan indeks variabel (Dimulai dari 0)
// Indeks 0 = Senin, Indeks 1 = Selasa, dst.
echo "Hari pertama dalam seminggu adalah " . $nama_hari[0] . "<br>";
echo "Hari terakhir dalam seminggu adalah " . $nama_hari[6];
?>