<?php
$uang1 = 1387500 % 100000;
$uang2 = $uang1 % 50000;
$uang3 = $uang2 % 20000;
$uang4 = $uang3 % 10000;
$uang5 = $uang4 % 5000;

$hasil1 = (1387500 - $uang1) / 100000;
echo "Uang 100.000: " . $hasil1 . "<br>";

$hasil2 = ($uang1 - $uang2) / 50000;
echo "Uang 50.000: " . $hasil2 . "<br>";  

$hasil3 = ($uang2 - $uang3) / 20000;
echo "Uang 20.000: " . $hasil3 . "<br>";  

$hasil4 = ($uang3 - $uang4) / 10000;
echo "Uang 10.000: " . $hasil4 . "<br>";

$hasil5 = ($uang4 - $uang5) / 5000;
echo "Uang 5.000: " . $hasil5 . "<br>";

$data = [
    ["nama" => "Andi", "kelas" => "10"],
    ["nama" => "Budi", "kelas" => "11"]
];

foreach ($data as $d) {
    echo $d["nama"] . " - Kelas " . $d["kelas"] . "<br>";
}
?>