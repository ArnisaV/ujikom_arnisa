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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Halaman Komentar</title>
    
</head>
<body>
<ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Halaman Komentar</h1>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    
   

    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td>  <?=$data['judulfoto']?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td> <?=$data['deskripsifoto']?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tambah">
                  
                </td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Tanggal</th>
        <th>Aksi</th> <!-- New column header for action -->
    </tr>
    <?php
    $i= 1;
        include "koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"SELECT * from komentarfoto,user where komentarfoto.userid=user.userid");
        while($data=mysqli_fetch_array($sql)){
    ?>
        <tr>
        <td><?=$i ?></td>
            <td><?=$data['namalengkap']?></td>
            <td><?=$data['isikomentar']?></td>
            <td><?=$data['tanggalkomentar']?></td>
            <td>
                <!-- Delete comment action -->
                <?php if($userid == $data['userid']){?>
                    <a href="hapus_komentar.php?komentarid=<?=$data['komentarid']?>&fotoid=<?= $fotoid ?>" class="icon-link"><i class="fas fa-trash-alt"></i></a>

                <?php }?>
            </td>
        </tr>
    <?php
        $i++; }
    ?>
</table>


    
</body>
</html>