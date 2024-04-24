<?php
 
   session_start();
   include "koneksi.php";

   $komentarId = $_GET['komentarid']; // Mengambil komentarid dari URL
    $fotoid=$_GET['fotoid'];
   $sql = mysqli_query($conn, "DELETE FROM komentarfoto WHERE komentarid='$komentarId'"); // Menghapus komentar berdasarkan komentarid

   if($sql) {
       // Jika penghapusan berhasil, kembalikan pengguna ke halaman foto.php
       header("location:komentar.php?fotoid=$fotoid");
   } else {
       // Jika terjadi kesalahan, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
       echo "Gagal menghapus komentar.";
   }
?>
