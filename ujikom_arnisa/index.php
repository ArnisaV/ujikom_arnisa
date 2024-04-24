<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Halaman Landing</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: antiquewhite;
           
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: grey;
            
           
        }

        li {
            float: left;
            
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
            
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: grey;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: burlywood;
            color: whitesmoke;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .icon-button {
            display: inline-block;
            background-color: transparent;
            color: #555;
            border: none;
            padding: 5px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon-button:hover {
            color: red;
        }
    </style>
</head>
<body>

    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <center><ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul></center>
    <?php
        } else {
    ?>   
      
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <h1>Halaman Landing</h1>
        <h2 style="text-align: center;">Selamat datang <b><?=$_SESSION['namalengkap']?></b></h2>
    <?php
        }
    ?>

    <div class="container">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Uploader</th>
                <th>Jumlah Like</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            include "koneksi.php";
            $sql = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.userid = user.userid");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><img src="gambar/<?=$data['lokasifile']?>" width="200"></td>
                    <td><?=$data['namalengkap']?></td>
                    <td><?php
                        $fotoid = $data['fotoid'];
                        $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a href="like.php?fotoid=<?=$data['fotoid']?>" class="icon-button"><i class="fas fa-heart"></i></a>
                        <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="icon-button"><i class="fas fa-comment"></i></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </div>
    
</body>
</html>
