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
    <link rel="stylesheet" href="style.css">
    <title>Halaman Edit Foto</title>
</head>
<body>
<ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Halaman Edit Foto</h1>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    
  

    <form action="update_foto.php" method="post" enctype="multipart/form-data" class="form-container">
    <?php
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
        while($data=mysqli_fetch_array($sql)){
    ?>
    <input type="hidden" name="fotoid" value="<?=$data['fotoid']?>" hidden>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judulfoto" value="<?=$data['judulfoto']?>" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsifoto" value="<?=$data['deskripsifoto']?>" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="lokasiFile">Lokasi File</label>
        <input type="file" id="lokasiFile" name="lokasifile" class="form-input">
    </div>
   
    <button type="submit" class="submit-button">Ubah</button>
    <?php
        }
    ?>
</form>


    
</body>
</html>