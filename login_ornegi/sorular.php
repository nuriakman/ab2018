<?php
  session_start();
  if( $_SESSION["giris_yapti"] <> "EVET") {
    header("location: yetkili.degilsiniz.php");
    //echo "<h1>Bu sayfaya giriş yetkiniz yok !!!</h1>";
    die(); // Yönlendirme sonrasında die() komutunu unutmayalım !!!
  }

?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Sorular</title>
</head>
<body>
<h1>Sorubankasında Bulunan Sorular</h1>

<p><a href="sorular1.php">1.Vize Soruları</a></p>
<p><a href="sorular2.php">1.Vize Soruları</a></p>
<p><a href="sorular3.php">Final Soruları</a></p>
<p>&nbsp;</p>
<p><a href="oturumu.kapat.php">Oturumu Sonlandır</a></p>

</body>

</html>
