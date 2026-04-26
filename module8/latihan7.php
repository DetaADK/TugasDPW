<?php

$namaBuah = array("Nanas", "Mangga", "jeruk", "Apel", "Melon", "Manggis");
echo "saya suka " . $namaBuah[0] . ", " . $namaBuah[1] . " dan " . $namaBuah[2] . ".<br>";

// tampilkan Mangga
echo "saya suka " . $namaBuah[1] . "<br>";
// tampilkan Jeruk
echo "saya suka " . $namaBuah[2] . "<br>";
// tampilkan Apel
echo "saya suka " . $namaBuah[3] . "<br>";
// tampilkan Melon
echo "saya suka " . $namaBuah[4] . "<br>";

echo "<br>";

// array dengan spesifik index (Associative Array)
$umur = array("Andi" => "35 Tahun", "Ben" => "37 Tahun", "Joe" => "43 Tahun");
$umur['ahmad'] = "50 Tahun";

echo "Umur andi adalah " . $umur['Andi'] . "<br>";

// tampilkan semua umur
foreach ($umur as $nama => $usia) {
    echo "Umur " . $nama . " adalah " . $usia . "<br>";
}

?>