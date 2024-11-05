<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Mata Kuliah</title>
</head>
<body>

	<h2>Jadwal Mata Kuliah</h2>
	<br/>
	<a href="tambah.php" style="padding:0.4% 0.8%; background-color: #009900; color: #fff; border-radius: 2px; text-decoration: none;">+ TAMBAH JADWAL </a>
	<br/>
	<br/>
	<table border="1" cellspacinh="0" width="75%">
		<tr>
		<th>NO</th>
		<th>Mata Kuliah</th>
		<th>Jadwal</th>
		<th>Lokal Kelas</th>
		<th>Nama Dosen</th>
		<th>Aksi</th>
		</tr>
<?php
include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, "select * from tb_matkul");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d[ 'nama_matkul' ]; ?></td>
		<td><?php echo $d[ 'jadwal' ]; ?></td>
		<td><?php echo $d[ 'lokal' ]; ?></td>
		<td><?php echo $d[ 'dosen' ]; ?></td>
		<td>
			<a href="edit.php?id_matkul=<?php echo $d['id_matkul']; ?>">EDIT</a>
			<a href="hapus.php?id_matkul=<?php echo $d['id_matkul']; ?>">HAPUS</a>
		</td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>