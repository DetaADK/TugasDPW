<?php
/* Operator logika yang bisa digunakan:
==   : Sama Dengan
===  : Identical
!=   : Tidak sama dengan
<>   : Tidak sama dengan
!==  : Not identical
>    : Lebih Besar dari
<    : Kurang Dari
>=   : Lebih besar atau Sama dengan
<=   : Kurang dari atau sama dengan
<=>  : Spaceship
*/

// --- Bagian 1: If ---
$t = date("H"); // Mendapatkan jam dengan format 1-24
echo "If<br>";
if ($t < 16) {
    echo "Selamat siang!<br>";
}

// --- Bagian 2: If Else ---
echo "<br> If dan Else <br>";
if ($t < 20) {
    echo "Selamat siang!<br>";
} else {
    echo "Selamat malam!<br>";
}

// --- Bagian 3: Nested If (If...elseif...else) ---
echo "<br> Nested If <br>";
if ($t < 10) {
    echo "Selamat Pagi!";
} elseif ($t < 16) {
    echo "Selamat sore!";
} else {
    echo "Selamat Malam!";
}
?>