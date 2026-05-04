<?php
// DATA MAHASISWA
$mahasiswa = [
    ["nama" => "Deta Aprilka Dario Karnavaro", "umur" => 20],
    ["nama" => "Rina", "umur" => 21],
    ["nama" => "Bagas", "umur" => 22],
    ["nama" => "Sinta", "umur" => 19],
    ["nama" => "Fajar", "umur" => 23],
    ["nama" => "Lutfi", "umur" => 20],
    ["nama" => "Ayu", "umur" => 21],
];

// HITUNG RATA-RATA UMUR
$totalUmur = 0;
foreach ($mahasiswa as $mhs) {
    $totalUmur += $mhs["umur"];
}
$rataUmur = $totalUmur / count($mahasiswa);

// FILTER UMUR >= 21
$dewasa = array_filter($mahasiswa, function($mhs) {
    return $mhs["umur"] >= 21;
});

// KONVERSI JSON
$jsonData = json_encode($mahasiswa, JSON_PRETTY_PRINT);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa & JSON</title>
    <style>
        body {
            font-family: Arial;
            background: #eef2f3;
            padding: 20px;
        }
        .box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        pre {
            background: #222;
            color: #0f0;
            padding: 10px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?= htmlspecialchars($mhs["nama"]); ?></td>
            <td><?= $mhs["umur"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="box">
    <h3>Rata-rata Umur</h3>
    <p><?= number_format($rataUmur, 2); ?> tahun</p>
</div>

<div class="box">
    <h3>Mahasiswa Umur ≥ 21</h3>
    <ul>
        <?php foreach ($dewasa as $d): ?>
            <li><?= htmlspecialchars($d["nama"]); ?> (<?= $d["umur"]; ?> tahun)</li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="box">
    <h3>Format JSON</h3>
    <pre><?= $jsonData; ?></pre>
</div>

</body>
</html>