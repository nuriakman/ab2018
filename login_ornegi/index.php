<?php
$HATAMESAJI = "";

  session_start();
  if( $_SESSION["giris_yapti"] == "EVET") {
    //Kullanıcı zaten giriş yapmış...
    header("location: sorular.php"); // Giriş yapmışsa bu sayfaya yönlendirelim
    die(); // Yönlendirme sonrasında die() komutunu unutmayalım !!!
  }

  if(isset($_POST["parola"])) {

      if( $_POST["parola"] == "123" and
          $_POST["ad"] == "demo") {
            // Giriş Başarılı !!!
            session_start();
            $_SESSION["giris_yapti"] = "EVET";
            header("Location: sorular.php");
            die(); // Yönlendirme sonrasında die() komutunu unutmayalım !!!
      } else {
         // Giriş hatalı !!!
         $HATAMESAJI = "Hatalı giriş";
      } // parola kontrolu

  } // Form gönderilmiş ise...
?>
<!DOCTYPE HTML>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Soru Bankası</title>
</head>
<body>
<h1>Soru Bankası Girişi</h1>
<?php
  if( $HATAMESAJI != "") {
    echo "<h3 style='color:red;'>$HATAMESAJI</h3>";
  }
?>



<form method="post">
  <p>ePosta Adresiniz: <input type="text" name="ad" ></p>
  <p>Parolanız: <input type="password" name="parola" ></p>
  <input type="submit" value="Gönder!">
</form>


</body>

</html>
