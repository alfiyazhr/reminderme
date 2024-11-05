<?php 
require '../../koneksi.php';

$id_list = $_GET["id_list"];

$query = "update tb_todolist set status='Selesai' where id_list='$id_list'";

mysqli_query($koneksi, $query);
header('location: todolist.php');

?>