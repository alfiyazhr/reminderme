<?php 
require '../koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST["username"] == null || $_POST["password"] == null || $_POST["nama_lengkap"] == null || $_POST["no_hp"] == null){
        echo 'Field Harus Diisi';
    }
    else{
        $username = $_POST["username"];
        $password = $_POST["password"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $no_hp = $_POST["no_hp"];
    
        $query = "insert into tb_user (username,password,nama_lengkap,no_hp) values ('$username','$password','$nama_lengkap','$no_hp')";
    
        mysqli_query($koneksi, $query);
        header('location:login.php?pesan=register_berhasil');
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
        }

        #login{
            width: 100%;
        }

        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background-color: white;
            margin: 70px 400px;
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
                margin: 70px 50px;
            }
        }

        @media screen and (max-width: 670px){
            .container{
                margin: 70px 30px;
            }
        }

    </style>
    <title>Register</title>
</head>
<body>
    <section id="login">
        <div class="container">
            <form action="" method="post">
                <h3>Register Page</h3>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Input Username..." required>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Input Password..." required>
                <label for="nama_lengkap">Nama Lengkap: </label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Input Nama Lengkap..." required>
                <label for="no_hp">No. Hp: </label>
                <input type="number" name="no_hp" id="no_hp" placeholder="Input No. Hp..." required>
                <button type="submit" name="submit" class="submit">Register</button>
                <a href="login.php">Sudah Daftar? Login Sekarang</a>
            </form>
        </div>
    </section>
</body>
</html>