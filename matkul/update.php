<?php
include '../koneksi.php';

$nama_matkul= $_POST['nama_matkul'];
$jadwal = $_POST['jadwal'];
$lokal = $_POST['lokal'];
$dosen= $_POST['dosen'];

mysqli_query($koneksi,"update tb_matkul set nama_matkul='$nama_matkul',jadwal='$jadwal', lokal='$lokal',dosen='$dosen'");
header("location:index.php");
?>