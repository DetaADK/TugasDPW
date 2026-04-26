<?php
// Tentukan angka yang ingin dikonversi (1-9)
$angka = 7; 

echo "<h2>Konversi Angka ke Terbilang</h2>";
echo "Input Angka: <b>$angka</b><br>";

// Mekanisme Switch untuk konversi
switch ($angka) {
    case 1:
        $terbilang = "Satu";
        break;
    case 2:
        $terbilang = "Dua";
        break;
    case 3:
        $terbilang = "Tiga";
        break;
    case 4:
        $terbilang = "Empat";
        break;
    case 5:
        $terbilang = "Lima";
        break;
    case 6:
        $terbilang = "Enam";
        break;
    case 7:
        $terbilang = "Tujuh";
        break;
    case 8:
        $terbilang = "Delapan";
        break;
    case 9:
        $terbilang = "Sembilan";
        break;
    default:
        $terbilang = "Angka di luar jangkauan (Masukan 1-9)";
        break;
}

echo "Hasil Konversi: <span style='color: green; font-weight: bold;'>$terbilang</span>";
?>