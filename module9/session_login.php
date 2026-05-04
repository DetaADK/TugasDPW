<?php
session_start();

//data Akun
$akun = [
    "deta" => [
        "password" => "12345",
        "nama" => "Deta Aprilka Dario Karnavaro",
        "nim" => "253307051"
    ],
    "admin" => [
        "password" => "admin",
        "nama" => "Administrator",
        "nim" => "-"
    ]
];

// Fungsi untuk membersihkan input
function clean($input) {
    return htmlspecialchars(trim($input));
}

$pesan = "";

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Cek apakah user sudah login
if (isset($_SESSION['user'])) {
    $dataUser = $_SESSION['user'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard User</title>
        <style>
            body { font-family: Arial; background: #eef2f3; padding: 20px; }
            .card {
                background: white;
                padding: 20px;
                border-radius: 10px;
                max-width: 400px;
            }
            .btn {
                background: red;
                color: white;
                padding: 8px;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>

    <div class="card">
        <h2>Dashboard</h2>
        <p>Halo, <b><?= $dataUser['nama']; ?></b></p>
        <p>NIM: <?= $dataUser['nim']; ?></p>
        <p>Session aktif: <?= session_id(); ?></p>
        <br>
        <a class="btn" href="?logout=1">Logout</a>
    </div>

    </body>
    </html>
    <?php
    exit();
}

// Proses Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            throw new Exception("Semua field wajib diisi!");
        }

        $user = clean($_POST['username']);
        $pass = clean($_POST['password']);

        if (isset($akun[$user]) && $akun[$user]['password'] === $pass) {
            $_SESSION['user'] = $akun[$user];
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            throw new Exception("Login gagal! Username atau password salah.");
        }

    } catch (Exception $e) {
        $pesan = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        button {
            width: 100%;
            padding: 8px;
            background: green;
            color: white;
            border: none;
        }
        .error {
            color: red;
            font-size: 13px;
        }
    </style>

    <script>
        function togglePassword() {
            let p = document.getElementById("pass");
            p.type = (p.type === "password") ? "text" : "password";
        }
    </script>
</head>
<body>

<div class="login-box">
    <h2>Login User</h2>

    <?php if ($pesan): ?>
        <p class="error"><?= $pesan; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password" id="pass">
        <small><input type="checkbox" onclick="togglePassword()"> Tampilkan Password</small>
        <br><br>

        <button type="submit">Masuk</button>
    </form>

    <p style="font-size:12px; margin-top:10px;">
        Demo akun:<br>
        user: <b>deta</b> | pass: <b>12345</b>
    </p>
</div>

</body>
</html>