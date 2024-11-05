<?php

include '../koneksi.php';
$ID= $_GET['id_matkul'];
mysqli_query($koneksi, "delete from tb_matkul where id_matkul= '$ID'");
header("location:index.php");

?>