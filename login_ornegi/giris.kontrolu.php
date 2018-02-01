<?php
  session_start();
  if( $_SESSION["giris_yapti"] <> "EVET") {
    //echo "<h1>Bu sayfaya giriş yetkiniz yok !!!</h1>";
    header("location: yetkili.degilsiniz.php"); // Giriş yapmamışsa bu sayfaya yönlendirelim
    die(); // Yönlendirme sonrasında die() komutunu unutmayalım !!!
  }
?>
