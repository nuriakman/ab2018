<?php

  /*
    Form'da "action"tanımı yapılmadığı için gönder denildiğinde aynı sayfaya gönderilecektir.

    Form sayfasına ilk defa giriliyorsa FORM'un gösterilmesi,
    Form gönderildiğinde ise FORM'un gizlenmesi ve teşekkür mesajının gösterilmesi örneği
  */

  define("BASLIK", "AB2018 Karabük - PHP Eğitimi");
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo BASLIK; ?></title>
</head>
<body>
<h1><?php echo "PHP Öğreniyoruz"; ?></h1>

<?php if ( !isset($_POST["ad"]) ) {  // Form sayfasına ilk defa giriş yapılıyor. ?>
  <form method="post">
    <p>KULLANICI ADINIZ: <input type="text" name="ad" ></p>
    <p>PAROLANIZ: <input type="password" name="parola" ></p>
    <input type="submit" value="Gönder!">
  </form>
<?php } ?>

<?php
  if(  isset($_POST["ad"]) ) { // Form, gönder düğmesine basılarak gönderilmiş.
    echo "<h1>Teşekkür ederiz...</h1>";
    echo "Girilen Ad : " . $_POST["ad"];
  }
?>

</body>

</html>
