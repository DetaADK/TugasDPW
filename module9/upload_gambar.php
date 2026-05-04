<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Pilih Gambar:
    <input type="file" name="gambar">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {

    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // cek apakah file gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . "<br>";
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }

    // cek file sudah ada
    if (file_exists($target_file)) {
        echo "File sudah ada.<br>";
        $uploadOk = 0;
    }

    // cek ukuran (500kb)
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "File terlalu besar.<br>";
        $uploadOk = 0;
    }

    // cek format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && 
        $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Hanya JPG, JPEG, PNG & GIF yang diperbolehkan.<br>";
        $uploadOk = 0;
    }

    // cek jika lolos semua
    if ($uploadOk == 0) {
        echo "File gagal diupload.<br>";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diupload.<br>";
        } else {
            echo "Terjadi error saat upload.<br>";
        }
    }
}
?>

</body>
</html>