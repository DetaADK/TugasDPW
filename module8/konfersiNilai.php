<?php
// Tentukan nilai angka yang akan dikonversi
$nilai_angka = 85; // Anda bisa mengganti angka ini untuk tes

echo "<h2>Konversi Nilai Angka ke Huruf</h2>";
echo "Nilai Angka: <b>$nilai_angka</b><br>";

/* Aturan Konversi:
C  = 0  -> 59
BC = 60 -> 69
B  = 70 -> 79
AB = 80 -> 89
A  = 90 -> 100
*/

if ($nilai_angka >= 90 && $nilai_angka <= 100) {
    $nilai_huruf = "A";
} elseif ($nilai_angka >= 80 && $nilai_angka <= 89) {
    $nilai_huruf = "AB";
} elseif ($nilai_angka >= 70 && $nilai_angka <= 79) {
    $nilai_huruf = "B";
} elseif ($nilai_angka >= 60 && $nilai_angka <= 69) {
    $nilai_huruf = "BC";
} elseif ($nilai_angka >= 0 && $nilai_angka <= 59) {
    $nilai_huruf = "C";
} else {
    $nilai_huruf = "Nilai tidak valid!";
}

echo "Nilai Huruf: <span style='font-size: 20px; color: blue;'><b>$nilai_huruf</b></span>";
?>