<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Foto</title>
    <style>
        /* Styling for form elements */
        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        /* Styling for table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        /* Styling for action icons */
        .icon-link {
            color: #007bff;
            text-decoration: none;
            margin-right: 5px;
        }

        .icon-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <h1>Halaman Foto</h1>
    <h2>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h2>
    
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judulfoto" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsifoto" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="lokasiFile">Lokasi File</label>
            <input type="file" id="lokasiFile" name="lokasifile" class="form-input" required>
        </div>
        <button type="submit" class="submit-button">Tambah</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
         $i= 1;
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$i ?></td>
            <td><?=$data['judulfoto']?></td>
            <td><?=$data['deskripsifoto']?></td>
            <td><?=$data['tanggalunggah']?></td>
            <td>
                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
            </td>
            <td>
                <?php
                    $fotoid=$data['fotoid'];
                    $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                ?>
            </td>
            <td>
                <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="icon-link"><i class="fas fa-trash-alt"></i></a>
                <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="icon-link"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        <?php
             $i++; }
        ?>
    </table>
</body>
</html>
