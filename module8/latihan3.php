<?php
$x = 5;
$y = 10;

// Arithmetic operators
echo "Penambahan " . ($x + $y) . "<br>";
echo "Pengurangan " . ($x - $y) . "<br>";
echo "Perkalian " . ($x * $y) . "<br>";
echo "Pembagian " . ($x / $y) . "<br>";
echo "Modulus " . ($x % $y) . "<br>";
echo "Exponensial " . ($x ** $y) . "<br>";
echo "<br>";

// Assignment operators
$x += 2; // $x = $x + 2
$y *= 2; // $y = $y * 2
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo "<br>";

// Increment/Decrement operators
echo "Isi ++x = " . ++$x . "<br>";
echo "Isi x++ = " . $x++ . "<br>";
echo "Isi x = " . $x . "<br>";
echo "<br>";
echo "Isi --y = " . --$y . "<br>";
echo "Isi y-- = " . $y-- . "<br>";
echo "Isi y = " . $y . "<br>";
echo "<br>";

// Conditional assignment operators
$user = "Andi darmawan";
// <kondisi> ? <nilai_jika_kondisi_true> : <nilai_jika_kondisi_false>
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status . "<br>";

// Variable $color diisi dengan "red" jika $color tidak ada atau null
$color = $color ?? "red";
echo $color . "<br>";

echo "<hr>";
echo "<h3>Perbedaan \$x++ dan ++\$x:</h3>";
echo "<ul>
        <li><b>++\$x (Pre-increment):</b> Nilai \$x ditambah 1 dulu, baru kemudian nilainya dikembalikan/ditampilkan.</li>
        <li><b>\$x++ (Post-increment):</b> Nilai \$x dikembalikan/ditampilkan dulu, baru kemudian nilainya ditambah 1.</li>
      </ul>";
?>