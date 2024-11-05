<?php 
require '../../koneksi.php';

$id_matkul = $_GET["id_matkul"];
$query = "delete from tb_matkul where id_matkul='$id_matkul'";
mysqli_query($koneksi, $query);

header('location: matakuliah.php');
?>