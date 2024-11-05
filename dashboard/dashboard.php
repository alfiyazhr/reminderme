<?php 
session_start();
if($_SESSION["status"] != 'login'){
    header("location: ../login/login.php?pesan=belum_login");
}
require '../koneksi.php';

$id_user = $_SESSION["id_user"];

$query = "select * from tb_user where id_user='$id_user'";

$result = mysqli_query($koneksi, $query);
$show = mysqli_fetch_assoc($result);


$url = $_SERVER["REQUEST_URI"];

if($url == "/tugas_akhir/dashboard/dashboard.php"){
    $isActive = "dashboard";
}
else if($url == "/tugas_akhir/dashboard/matakuliah/matakuliah.php" || $url == "/tugas_akhir/dashboard/matakuliah/tambahmatkul.php" || $url == "/tugas_akhir/dashboard/matakuliah/editmatkul.php"){
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
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/fontawesome4/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
    <section id="split">
        <div class="sidebar">
            <h3>Reminder <span>Me</span></h3>
            <ul>
                <a href="dashboard.php" <?php if($isActive == "dashboard") echo 'class="active"'; ?>>
                    <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                    <li>Home</li>
                </a>
                <a href="matakuliah/matakuliah.php"<?php if($isActive == "matakuliah") echo 'class="active"'; ?>>
                    <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
                    <li>Mata Kuliah</li>
                </a>
                <a href="todolist/todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>>
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
                    <img class="profile" src="../assets/profil.png" alt="">
                </nav>
                <div class="dropdown">
                    <ul>
                        <a href="profile.php?id_user=<?= $show["id_user"];?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <li>Profile</li>
                        </a>
                        <a href="../login/logout.php">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <li>Log Out</li>
                        </a>
                    </ul>
                </div>
            </header>
            <main>
                <h3>Welcome, <span><?= $show["nama_lengkap"]; ?></span></h3>
                <p>Pada page ini kamu bisa mengatur jadwal Kuliah sesuai dengan yang kamu inginkan.</p>
                <a href="">Lihat Tutorial</a>
            </main>
            <footer>
                <div class="responsive-menu">
                    <a href="dashboard.php" <?php if($isActive == "dashboard") echo 'class="active"'; ?>><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                    <a href="matakuliah/matakuliah.php" <?php if($isActive == "matakuliah") echo 'class="active"'; ?>><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></a>
                    <a href="todolist/todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>><i class="fa fa-list fa-2x" aria-hidden="true"></i></a>
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