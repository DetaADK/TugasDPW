<?php
$pokok = 3250000;
$tunj = 1200000;
echo "Gaji pokok: " . $pokok . "<br>";
echo "Tunjangan: " . $tunj . "<br>";

$gjktr = $pokok + $tunj;
$pjk = 0.1 * $gjktr;
echo "Gaji kotor: " . $gjktr . "<br>";
echo "Potongan: " . $pjk . "<br>";

$gjbrsh = $gjktr - $pjk;
echo "Gaji bersih: " . $gjbrsh . "<br>";
?>