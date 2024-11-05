<?php

include '../koneksi.php';

$nama_matkul= $_POST['nama_matkul'];
$jadwal = $_POST['jadwal'];
$lokal = $_POST['lokal'];
$dosen= $_POST['dosen'];


mysqli_query($koneksi, "insert into tb_matkul (nama_matkul, jadwal, lokal, dosen) values('$nama_matkul','$jadwal', '$lokal','$dosen')");

header("location:index.php");

?>