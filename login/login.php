<?php 
session_start();
require '../koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from tb_user where username='$username' and password='$password'";

    $result = mysqli_query($koneksi, $query);
    $show = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);

    if($check > 0){
        $_SESSION['id_user'] = $show["id_user"];
        $_SESSION['status'] = 'login';
        header('location: ../dashboard/dashboard.php');
    }
    else{
        header('location: login.php?pesan=login_error');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;800&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font);
        }

        :root{
            --warna1: rgb(248, 111, 3);
            --font: 'Plus Jakarta Sans', sans-serif;
        }

        body{
            background-color: var(--warna1);
            transtion: all 0.2s;
        }

        #login{
            width: 100%;
            transition: all 0.2s;
        }

        #login.message{
            opacity: 0.2;
        }

        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background-color: white;
            margin: 150px 400px;
        }

        form{
            width: 100%;
            padding: 50px ;
            display: flex;
            flex-direction: column;
        }

        form h3{
            text-align: center;
            margin: 10px 0;
        }

        label{
            margin: 5px 0;
        }

        input{
            margin-bottom: 10px;
            padding: 10px 15px;
            border: none;
        }

        button{
            padding: 10px ;
            font-weight: bold;
            transition: all 0.2s;
            background-color: var(--warna1);
            border: 2px solid var(--warna1);
            border-radius: 10px;
            color: white;
        }

        button:hover{
            border: 2px solid var(--warna1);
            background-color: white;
            color: var(--warna1);
        }

        a{
            margin-top: 20px;
            text-decoration: none;
            font-size: 13px;
        }

        @media screen and (max-width: 1000px){
            .container{
                margin: 150px 50px;
            }
        }

        @media screen and (max-width: 670px){
            .container{
                margin: 150px 30px;
            }
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

        .content-alert button{
            padding: 10px 100px;
        }

        @media screen and (max-width: 670px){
            #alert{
                width: 95%;
                margin: -550px 10px;
            }
        }

    </style>
    <title>Login</title>
</head>
<body>
    <section id="login">
        <div class="container">
            <form action="" method="post">
                <h3>Login Page</h3>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Input Username...">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Input Password...">
                <button type="submit" name="submit">Login</button>
                <a href="register.php">Belum Daftar? Register Sekarang</a>
            </form>
        </div>
    </section>

    <section id="alert">
        <div class="content-alert">
            <h3>Title</h3>
            <img src="../assets/checklist.png" alt="">
            <p>paragraph</p>
            <button class="close">Tutup</button>
        </div>
    </section>
</body>
<?php 
if(isset($_GET["pesan"])){
    if($_GET["pesan"] == "register_berhasil"){
        echo "<script type='text/javascript' src='../style/alertregister.js'></script>";
    }
    else if($_GET["pesan"] == "login_error"){
        echo "<script type='text/javascript' src='../style/loginerror.js'></script>";
    }
    else if($_GET["pesan"] == "belum_login"){
        echo "<script type='text/javascript' src='../style/belumlogin.js'></script>";
    }
}
?>
</html>