<?php
// Ambil Data Gambar
$folder_path = "gambar/";
$daftar_gambar = glob($folder_path . "*");

// Filter hanya file
$images = array_filter($daftar_gambar, function($file) {
    return is_file($file);
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Galeri Foto</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f2f5;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card p {
            padding: 10px;
            font-size: 14px;
            text-align: center;
        }
        .empty {
            text-align: center;
            color: gray;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<h2>Galeri Gambar Saya</h2>

<?php if (count($images) > 0): ?>
    <div class="gallery-container">
        <?php foreach ($images as $img): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($img); ?>" alt="gambar">
                <p><?= strtoupper(pathinfo($img, PATHINFO_FILENAME)); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="empty">Belum ada gambar yang tersedia.</p>
<?php endif; ?>

</body>
</html>