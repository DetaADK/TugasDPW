<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

<?php
// inisialisasi
$nama = $password = "";
$namaErr = $passwordErr = "";

// fungsi filter input
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// cek saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validasi username
    if (empty($_POST["u"])) {
        $namaErr = "Masukkan username";
    } else {
        $nama = bersihkan_input($_POST["u"]);
    }

    // validasi password
    if (empty($_POST["p"])) {
        $passwordErr = "Masukkan password";
    } else {
        $password = bersihkan_input($_POST["p"]);
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Username: <input type="text" name="u">
    <span class="error">* <?php echo $namaErr; ?></span>
    <br><br>

    Password: <input type="password" name="p">
    <span class="error">* <?php echo $passwordErr; ?></span>
    <br><br>

    <input type="submit" value="Login">
</form>

<?php
// tampilkan hasil jika tidak ada error
if ($_SERVER["REQUEST_METHOD"] == "POST" && $namaErr == "" && $passwordErr == "") {
    echo "<h3>Login Berhasil</h3>";
    echo "Username: " . $nama . "<br>";
    echo "Password: " . $password . "<br>";
}
?>

</body>
</html>