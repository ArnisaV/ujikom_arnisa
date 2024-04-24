<?php
    include "koneksi.php";
    session_start();

    $judulfoto=$_POST['judulfoto'];
    $fotoid=$_POST['fotoid'];
    $deskripsifoto=$_POST['deskripsifoto'];

    if($_FILES['lokasifile']['name']!=""){
        $rand= rand();
        $ekstensi = array ('png','jpg','jpeg','gif');
        $filename = $_FILES['lokasifile']['name'];
        $ukuran= $_FILES['lokasifile']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $user = $_SESSION['userid'];

        if(!in_array($ext, $ekstensi) ) {
            header("location:foto.php");
        }else{
            if($ukuran < 1044070){
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
                mysqli_query($conn,"UPDATE foto set judulfoto='$judulfoto',
                deskripsifoto='$deskripsifoto',lokasifile='$xx' WHERE userid = $user AND fotoid = $fotoid");
                header("location:foto.php");
            }else{
                echo "<script>
                alert('Anda berhasil Mengedit foto');
                location.href='foto.php';</script>";
            }
        }
    }else{
        mysqli_query($conn, "update foto set judulfoto='$judulfoto',
        deskripsifoto='$deskripsifoto',lokasifile='$xx'");
        header("location:foto.php");
    }  
?>