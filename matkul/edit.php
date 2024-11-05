
<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Mata Kuliah</title>
</head>
<body>

	<h2>Jadwal Mata Kuliah</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>Edit Jadwal Mata Kuliah</h3>

	<?php 

	include 'koneksi.php';
	$ID = $_GET['id_matkul'];
	$data = mysqli_query($koneksi, "select * from tb_matkul where id_matkul= '$ID'");
	$matkul = mysqli_fetch_assoc($data);

	?>

	<form method="post" action="update.php">
		<table>
			<tr>
				<td>Mata Kuliah</td>
				<td><input type="text" name="nama_matkul"
					value="<?= $matkul['nama_matkul'] ?>"
				></td>
			</tr>
			<tr>
				<td>Jadwal</td>
				<td><input type="text" name="jadwal"
					value="<?= $matkul['jadwal'] ?>"
				></td>
				<tr>
				<td>Lokal</td>
				<td><input type="text" name="lokal"
					value="<?= $matkul['lokal'] ?>"
				></td>
			</tr><tr>
				<td>Nama Dosen</td>
				<td><input type="text" name="dosen"
					value="<?= $matkul['dosen'] ?>"
				></td>
			</tr>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"
				value="SIMPAN"></td> 
			</tr>
		</table>
	</form>
</body>
</html>