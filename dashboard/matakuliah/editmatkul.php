<?php
session_start();
if($_SESSION["status"] != 'login'){
    header("location: ../../login/login.php?pesan=belum_login");
}

require '../../koneksi.php';

$id_matkul_get = $_GET["id_matkul"];
$query = "select * from tb_matkul where id_matkul='$id_matkul_get'";
$result = mysqli_query($koneksi, $query);
$show = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kode_matkul = $_POST["kode_matkul"];
    $nama_matkul = $_POST["nama_matkul"];
    $jadwal = $_POST["jadwal"];
    $lokal = $_POST["lokal"];
    $dosen = $_POST["dosen"];

    $query = "update tb_matkul set kode_matkul='$kode_matkul',nama_matkul='$nama_matkul',jadwal='$jadwal',lokal='$lokal',dosen='$dosen' where id_matkul='$id_matkul_get'";

    mysqli_query($koneksi, $query);
    header('location: matakuliah.php?pesan=edit_sukses');
}

$url = $_SERVER["REQUEST_URI"];

if($url == "/tugas_akhir/dashboard/dashboard.php"){
    $isActive = "dashboard";
}
else if($url == "/tugas_akhir/dashboard/matakuliah/matakuliah.php" || $url == "/tugas_akhir/dashboard/matakuliah/tambahmatkul.php" || $url == "/tugas_akhir/dashboard/matakuliah/editmatkul.php?id_matkul=$id_matkul_get"){
    $isActive = "matakuliah";
}
else if($url == "/tugas_akhir/dashboard/todolist/todolist.php" || $url == "/tugas_akhir/dashboard/todolist/tambahtodolist.php" || $url == "/tugas_akhir/dashboard/todolist/edittodolist.php"){
    $isActive = "todolist";
}
else{
    $isActive = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/em.css">
    <link rel="stylesheet" href="../../style/fontawesome4/css/font-awesome.min.css">
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <section id="split">
        <div class="sidebar">
            <h3>Reminder <span>Me</span></h3>
            <ul>
                <a href="../dashboard.php" <?php if($isActive == "dashboard") echo 'class="active"'; ?>>
                    <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                    <li>Home</li>
                </a>
                <a href="matakuliah.php"<?php if($isActive == "matakuliah") echo 'class="active"'; ?>>
                    <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
                    <li>Mata Kuliah</li>
                </a>
                <a href="../todolist/todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>>
                    <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                    <li>Todo List</li>
                </a>
            </ul>
        </div>
        <div class="container">
            <header>
                <nav>
                    <div class="button-sidebar">
                        <input type="checkbox">
                        <span class="shape"></span>
                        <span class="shape"></span>
                        <span class="shape"></span>
                    </div>
                    <img class="profile" src="../../assets/profil.png" alt="">
                </nav>
                <div class="dropdown">
                    <ul>
                        <a href="../profile.php?id_user=<?= $show["id_user"];?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <li>Profile</li>
                        </a>
                        <a href="../../login/logout.php">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <li>Log Out</li>
                        </a>
                    </ul>
                </div>
            </header>
            <main>
                <h3>Edit Mata Kuliah</h3>
                <form action="" method="post">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <input type="text" id="nama_matkul" name="nama_matkul" placeholder="Input Nama Matkul..." required value="<?= $show["nama_matkul"];?>">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                    <input type="text" id="kode_matkul" name="kode_matkul" placeholder="Input Kode Matkul..." required value="<?= $show["kode_matkul"];?>">
                    <label for="jadwal">Jadwal Mata Kuliah</label>
                    <input type="text" id="jadwal" name="jadwal" placeholder="Input Jadwal Matkul..." required value="<?= $show["jadwal"];?>">
                    <label for="lokal">Lokasi</label>
                    <input type="text" id="lokal" name="lokal" placeholder="Input Lokal Matkul..." required value="<?= $show["lokal"];?>">
                    <label for="dosen">Nama Dosen</label>
                    <input type="text" id="dosen" name="dosen" placeholder="Input Nama Dosen..." required value="<?= $show["dosen"];?>">
                    <button type="submit">Edit</button>
                </form>
            </main>
            <footer>
                <div class="responsive-menu">
                    <a href="../dashboard.php" <?php if($isActive == "dashboard") echo 'class="active"'; ?>><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                    <a href="matakuliah.php" <?php if($isActive == "matakuliah") echo 'class="active"'; ?>><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></a>
                    <a href="../todolist/todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>><i class="fa fa-list fa-2x" aria-hidden="true"></i></a>
                </div>
            </footer>
        </div>
    </section>
</body>
<script>
    const input = document.querySelector('.button-sidebar input')
    const split = document.getElementById('split')
    const sidebar = document.querySelector('.sidebar')
    const container = document.querySelector('.container')
    const profil = document.querySelector('.profile')
    const dropdown = document.querySelector('.dropdown')

    profil.addEventListener("click", () => {
        dropdown.classList.toggle('slide')
    })

    input.addEventListener("click", () => {
        split.classList.toggle('slide')
        sidebar.classList.toggle('slide')
        container.classList.toggle('slide')
    })
</script>
</html>