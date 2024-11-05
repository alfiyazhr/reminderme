<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Mata Kuliah</title>
</head>
<body>

	<h2>Tambah Jadwal Mata Kuliah</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<form method="post" action="tambah_aksi.php">
		<table>
			<tr>
				<td>Mata Kuliah</td>
				<td><input type="text" name="nama_matkul"></td>
			</tr>
			<tr>
				<td>Jadwal</td>
				<td><input type="text" name="jadwal"></td>
			</tr>
			<tr>
				<td>Lokal Kelas</td>
				<td><input type="text" name="lokal"></td>
			</tr>
			<tr>
				<td>Nama Dosen</td>
				<td><input type="text" name="dosen"></td>
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