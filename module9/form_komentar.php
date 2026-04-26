<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Nama: <input type="text" name="nama"><br><br>
    E-mail: <input type="email" name="email"><br><br>
    Komentar:<br>
    <textarea name="comment" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="Simpan">
    <input type="reset" value="Bersihkan">
</form>

<?php
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nama = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = bersihkan_input($_POST["nama"]);
    $email = bersihkan_input($_POST["email"]);
    $comment = bersihkan_input($_POST["comment"]);

    echo "<h3>Hasil Input:</h3>";
    echo "Nama: " . $nama . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Komentar: " . $comment . "<br>";
    echo "<hr>";

    // KESIMPULAN DITAMPILKAN DI WEB
    echo "<h3>Kesimpulan:</h3>";
    echo "<ul>";
    echo "<li>Input dari user harus diamankan sebelum ditampilkan.</li>";
    echo "<li>Tanpa filter, input bisa mengandung script berbahaya (XSS).</li>";
    echo "<li>Fungsi htmlspecialchars() mencegah script dijalankan.</li>";
    echo "<li>Data yang sudah difilter akan tampil sebagai teks biasa.</li>";
    echo "</ul>";
}
?>

</body>
</html>