<?php
// Konfigurasi Awal
$cookie_expired = time() + (60 * 60 * 24); // 1 hari
$message = "";

// Simpan data ke Cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_data'])) {
        $nama_user  = $_POST['nama_user'];
        $email_user = $_POST['email_user'];
        $nim_user   = $_POST['nim_user'];

        setcookie("user_nama", $nama_user, $cookie_expired, "/");
        setcookie("user_email", $email_user, $cookie_expired, "/");
        setcookie("user_nim", $nim_user, $cookie_expired, "/");

        header("Location: " . $_SERVER['PHP_SELF'] . "?status=tersimpan");
        exit();
    }
}

// Hapus Cookie
if (isset($_GET['delete'])) {
    setcookie("user_nama", "", time() - 3600, "/");
    setcookie("user_email", "", time() - 3600, "/");
    setcookie("user_nim", "", time() - 3600, "/");

    header("Location: " . $_SERVER['PHP_SELF'] . "?status=terhapus");
    exit();
}

// Cek Status
if (isset($_GET['status'])) {
    if ($_GET['status'] == "tersimpan") {
        $message = "Data berhasil disimpan di cookies.";
    } elseif ($_GET['status'] == "terhapus") {
        $message = "Data cookies berhasil dihapus.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penyimpanan Data Cookies</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }
        .btn-save {
            background: green;
            color: white;
        }
        .btn-delete {
            background: red;
            color: white;
            text-decoration: none;
            padding: 6px 10px;
        }
        .message {
            margin-bottom: 10px;
            color: blue;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Data Identitas (Cookies)</h2>

    <?php if (!empty($message)) { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <?php if (isset($_COOKIE['user_nama'])) { ?>
        
        <p><b>Nama:</b> <?php echo htmlspecialchars($_COOKIE['user_nama']); ?></p>
        <p><b>Email:</b> <?php echo htmlspecialchars($_COOKIE['user_email']); ?></p>
        <p><b>NIM:</b> <?php echo htmlspecialchars($_COOKIE['user_nim']); ?></p>

        <a class="btn-delete" href="?delete=1">Hapus Data</a>

    <?php } else { ?>

        <form method="POST">
            <label>Nama:</label><br>
            <input type="text" name="nama_user" value="Deta Aprilka Dario Karnavaro"><br><br>

            <label>Email:</label><br>
            <input type="email" name="email_user" placeholder="email@contoh.com"><br><br>

            <label>NIM:</label><br>
            <input type="text" name="nim_user" value="253307051"><br><br>

            <button class="btn btn-save" type="submit" name="submit_data">
                Simpan Data
            </button>
        </form>

    <?php } ?>
</div>

</body>
</html>