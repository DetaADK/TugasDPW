<?php

// data kelas dengan array 2 dimensi
$array = array(
    "1C" => array("udin", "ismail", "adi"),
    "1D" => array("lukman", "fajri", "mahmud")
);

// menampilkan data array secara keseluruhan
print_r($array);
echo "<br><br>";

// menampilkan kelas 1C (catatan: di gambar tertulis 1D tapi komentarnya kelas 1C)
print_r($array['1C']);
echo "<br><br>";

// menampilkan kelas 1d dengan index 0
echo "Data kelas 1D indeks 0: " . $array['1D'][0];
echo "<br>";

// tampilkan fajri
// Fajri ada di kelas 1D pada indeks ke-1
echo "Tampilkan fajri: " . $array['1D'][1];
echo "<br>";

// tampilkan adi
// Adi ada di kelas 1C pada indeks ke-2
echo "Tampilkan adi: " . $array['1C'][2];
echo "<br><br>";

// data kelas bisa ditulis juga dengan sintaks yang lebih singkat []
$array_simple = [
    "1C" => ["udin", "ismail", "adi"],
    "1D" => ["lukman", "fajri", "mahmud"]
];

// Contoh menampilkan mahmud dari array_simple
echo "Tampilkan mahmud: " . $array_simple['1D'][2];

?>