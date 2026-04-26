<?php
$data = [
    ["no" => "1", "poin" => "75", "siswa" => "Adi"],
    ["no" => "2", "poin" => "80", "siswa" => "Joni"],
    ["no" => "3", "poin" => "65", "siswa" => "Jihan"],
    ["no" => "4", "poin" => "70", "siswa" => "Aya"],
    ["no" => "5", "poin" => "85", "siswa" => "Ita"],
    ["no" => "6", "poin" => "90", "siswa" => "Budi"],
    ["no" => "7", "poin" => "95", "siswa" => "Tini"],
    ["no" => "8", "poin" => "65", "siswa" => "Sari"]
];
foreach ($data as $n) {
    if ($n['poin'] == "85") {
        echo "Nama siswa dengan nomor urut 5  : ".$n['siswa'] . "<br>";
    }
}

foreach ($data as $n) {
    if ($n['poin'] == "90") {
        echo "Nama siswa dengan nilai 90 adalah : ".$n['siswa'] . "<br>";
    }
}

foreach ($data as $n) {
    if ($n['poin'] == "100") {
        echo "Nama siswa dengan nilai 100 adalah : ".$n['siswa'] . "<br>";
        $kosong = true;
    } 
}
if (!$kosong) {
        echo "Tidak ada siswa dengan nilai 100" . "<br>";
    }
?>