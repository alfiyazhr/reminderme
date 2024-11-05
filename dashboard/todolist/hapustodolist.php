<?php
require '../../koneksi.php' ;
$id_list_get = $_GET["id_list"];

$query = "delete from tb_todolist where id_list='$id_list_get'";
mysqli_query($koneksi, $query);
header('location: todolist.php');

?>