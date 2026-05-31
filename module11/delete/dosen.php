<?php
include("../koneksi.php");

if (isset($_GET["idDosen"])) {
    $idDosen = $_GET["idDosen"];
    $query   = "DELETE FROM tbl_dosen WHERE idDosen='$idDosen'";
    $hasil_query = mysqli_query($link, $query);

    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
}

header("location:../view/dosen.php?msg=Data dosen berhasil dihapus!");
?>