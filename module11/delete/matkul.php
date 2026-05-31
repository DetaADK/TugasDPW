<?php
include("../koneksi.php");

if (isset($_GET["kodeMK"])) {
    $kodeMK = $_GET["kodeMK"];

    $query = "DELETE FROM tbl_matakuliah WHERE kodeMK='$kodeMK'";
    $hasil_query = mysqli_query($link, $query);

    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($link) . 
            " - " . mysqli_error($link));
    }
}

header("location:../view/matakuliah.php?msg=Data mata kuliah berhasil dihapus!");
?>