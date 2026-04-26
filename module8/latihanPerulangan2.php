<?php
$angka = ["12", "13", "15", "16","67","189","346","876","54232","3256"];

foreach ($angka as $n) {
    if ($n % 2 == 0) {
        echo "$n genap.<br>";
    }
    else {
        echo "$n ganjil.<br>";
    }
}
?>