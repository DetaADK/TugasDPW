<?php
  include("../koneksi.php");
 
  if (isset($_GET["npm"])) {
    $npm = $_GET["npm"];
    $query = "DELETE FROM tbl_mahasiswa WHERE npm='$npm'";
    $hasil_query = mysqli_query($link, $query);
    if (!$hasil_query) {
      die("Gagal menghapus data: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
  }
 
  header("location:../view/mhs.php?msg=Data mahasiswa berhasil dihapus!");
?>
