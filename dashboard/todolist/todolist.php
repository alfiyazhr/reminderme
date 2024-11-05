<?php
session_start();
if($_SESSION["status"] != 'login'){
    header("location: ../../login/login.php?pesan=belum_login");
}

require '../../koneksi.php';

$id_user = $_SESSION["id_user"];
$query = "select * from tb_user where id_user='$id_user'";
$result = mysqli_query($koneksi, $query);
$show = mysqli_fetch_assoc($result);
$id = $show["id_user"];

$querylist = "select * from tb_todolist where id_user='$id'";
$resultlist = mysqli_query($koneksi, $querylist);

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
    <link rel="stylesheet" href="../../style/todolist.css">
    <link rel="stylesheet" href="../../style/fontawesome4/css/font-awesome.min.css">
    <style>
        .icon{
            display: flex;
            padding-top: 20px;
            padding-bottom: 10px;
            align-items: center;
            justify-content: space-between;
        }
        .link{
            width: 90%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 5px;
        }
        .link a{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 0;
        }

        .icon img{
            display: none;
        }

        img.Selesai{
            display: block;
            width: 50px;
        }

        a#Selesai{
            display: none;
        }

        p#Pending{
            color: red;
        }

        p#Selesai{
            color: #3CDB7F;
        }

        /* alert style */
        #alert{
            margin-left: 330px;
            margin-right: 330px;
            margin-top: -600px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            width: 50%;
            opacity: 0;
            z-index: -1;
            transition: all 0.5s;
            border-radius: 20px;
        }

        #alert.show{
            z-index: 1;
            opacity: 1;
        }

        .content-alert{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 100px 0;
            text-align: center;
        }

        #alert img{
            margin: 20px 0;
            width: 30%;
        }

        .content-alert p{
            margin: 10px 50px;
        }

        .button-submit{
            display: flex;
        }

        .button-submit button{
            margin: 5px 10px;
            color: white;
            border: none;
            background-color: rgb(248, 111, 3);
            border-radius: 20px;
            padding: 10px 100px;
        }

        #split.opacity{
            opacity: 0.2;
        }

        @media screen and (max-width: 670px){
            #alert{
                width: 100%;
                margin: -550px 0;
            }

            #alert.show .button-submit{
                display: block;
            }
        }
    </style>
    <title>Dashboard</title>
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
                <a href="../matakuliah/matakuliah.php"<?php if($isActive == "matakuliah") echo 'class="active"'; ?>>
                    <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
                    <li>Mata Kuliah</li>
                </a>
                <a href="todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>>
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
                <h3>To Do List Kamu</h3>
                <a href="tambahtodolist.php">Tambah To Do List</a>
                <div class="list-content">
                    <?php foreach($resultlist as $list): ?>
                    <div class="content-matkul">
                        <h3><?= $list["task"];?></h3>
                        <p><b>Tanggal:</b> <?= $list["tanggal"];?></p>
                        <p><b>Mata Kuliah:</b> <?= $list["matkul"];?></p>
                        <b style="display: flex;">Status:<p style="padding-left: 5px;" id="<?= $list["status"];?>"> <?= $list["status"];?></p></b>
                        <div class="icon">
                            <img class="<?= $list["status"];?>" src="../../assets/checklist.png" alt="">
                            <div class="link">
                                <a id="<?= $list["status"];?>" href="edittodolist.php?id_list=<?= $list["id_list"];?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"><p>Edit</p></i></a>
                                <a style="background-color: red; " href="todolist.php?pesan=hapus_todolist&id_list=<?= $list["id_list"];?>"><i class="fa fa-trash fa-lg" aria-hidden="true"><p>Hapus</p></i></a>
                                <a id="<?= $list["status"];?>" style="background-color: #3CDB7F;" href="todolist.php?pesan=cek_todolist&id_list=<?= $list["id_list"];?>"><i class="fa fa-check fa-lg" aria-hidden="true"><p>Selesai</p></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </main>
            <footer>
                <div class="responsive-menu">
                    <a href="../dashboard.php" <?php if($isActive == "dashboard") echo 'class="active"'; ?>><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                    <a href="../matakuliah/matakuliah.php" <?php if($isActive == "matakuliah") echo 'class="active"'; ?>><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></a>
                    <a href="todolist.php" <?php if($isActive == "todolist") echo 'class="active"'; ?>><i class="fa fa-list fa-2x" aria-hidden="true"></i></a>
                </div>
            </footer>
        </div>
    </section>


    <section id="alert">
        <div class="content-alert">
            <h3>Title</h3>
            <img src="../../assets/checklist.png" alt="">
            <p>paragraph</p>
            <div class="button-submit">
                <button class="close">Tutup</button>
            </div>
        </div>
    </section>
</body>
<?php 
if(isset($_GET["pesan"])){
    if($_GET["pesan"] == "berhasil_tambah_todolist"){
        echo "<script type='text/javascript' src='../../style/todolist_berhasil.js'></script>";
    }
    else if($_GET["pesan"] == "edit_sukses"){
        echo "<script type='text/javascript' src='../../style/todolist_edit_sukses.js'></script>";
    }
    else if($_GET["pesan"] == "hapus_todolist"){
        $id_list = $_GET["id_list"];
        echo 
        "<script type='text/javascript'>
            const pesan = document.getElementById('alert');
            const close = document.querySelector('.close');
            const judul = document.querySelector('#alert h3');
            const paragraf = document.querySelector('#alert p');
            const image = document.querySelector('#alert img');
            const opacitySplit = document.querySelector('#split')
            const buttonDiv = document.querySelector('.button-submit')

            const hapus = document.createElement('button')
            hapus.setAttribute('class', 'hapus')
            hapus.innerHTML = 'Hapus'
            buttonDiv.insertBefore(hapus, buttonDiv.firstChild)

            const gantiWarna = document.querySelector('.hapus')
            hapus.style.backgroundColor = 'red';
            
            judul.innerHTML = 'Hapus List Ini ?';
            paragraf.innerHTML = 'Kamu yakin ingin menghapus List ini?';
            image.src = '../../assets/caution.png';
            pesan.classList.add('show');
            opacitySplit.classList.add('opacity');
            close.addEventListener('click', () => {
                pesan.classList.remove('show');
                opacitySplit.classList.remove('opacity');
                window.location.href = 'todolist.php'
            })

            hapus.addEventListener('click', () => {
                pesan.classList.remove('show');
                opacitySplit.classList.remove('opacity');
                window.location.href = 'hapustodolist.php?id_list=$id_list';
            })

        </script>";
    }
    else if($_GET["pesan"] == "cek_todolist"){
        $id_list = $_GET["id_list"];
        echo 
        "<script type='text/javascript'>
            const pesan = document.getElementById('alert');
            const close = document.querySelector('.close');
            const judul = document.querySelector('#alert h3');
            const paragraf = document.querySelector('#alert p');
            const image = document.querySelector('#alert img');
            const opacitySplit = document.querySelector('#split')
            const buttonDiv = document.querySelector('.button-submit')

            const hapus = document.createElement('button')
            hapus.setAttribute('class', 'hapus')
            hapus.innerHTML = 'Cek Selesai'
            buttonDiv.insertBefore(hapus, buttonDiv.firstChild)

            const gantiWarna = document.querySelector('.hapus')
            hapus.style.backgroundColor = '#3CDB7F';
            
            judul.innerHTML = 'Cek List Ini Sebagai Selesai?';
            paragraf.innerHTML = 'Kamu yakin ingin cek selesai list ini?';
            image.src = '../../assets/caution.png';
            pesan.classList.add('show');
            opacitySplit.classList.add('opacity');
            close.addEventListener('click', () => {
                pesan.classList.remove('show');
                opacitySplit.classList.remove('opacity');
                window.location.href = 'todolist.php'
            })

            hapus.addEventListener('click', () => {
                pesan.classList.remove('show');
                opacitySplit.classList.remove('opacity');
                window.location.href = 'cekselesai.php?id_list=$id_list';
            })

        </script>";
    }
}

?>


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