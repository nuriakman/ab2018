<?php
  session_start();
  if( $_SESSION["giris_yapti"] <> "EVET") {
    header("location: yetkili.degilsiniz.php");
    //echo "<h1>Bu sayfaya giriş yetkiniz yok !!!</h1>";
    die();
  }
?>
