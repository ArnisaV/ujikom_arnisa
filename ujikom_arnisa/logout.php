<?php
    session_start();
    session_destroy();
   echo "<script>
   alert('Anda berhasil Logout');
   location.href='index.php';</script>";
   
?>