<?php
  session_start();
  if( $_SESSION["giris_yapti"] == "EVET") {
    // daha önce giriş yapmış birisi, giriş (login) sayfasına yeniden girerse
    // tekrar giriş yapmasına ihtiyaç yoktur.
    // Bu nedenle, doğruca sorular.php sayfasına yönlendirilmesini yapalım.
    header("location: sorular.php");
    die();
  }

$HATAMESAJI = "";

  if(isset($_POST["parola"])) { // Form submit edilmiş...

    // 1.) veritabanına bağlan
    // 2.) o kullanıcıya ait kayıt VAR MI kontrolü yap
    // VAR ise OTURUMU AÇ ve sorular.php'ye yönlendir.
    // YOK ise hata mesajı veer

    require_once("config/connection.php");
    //$ad     = $_POST["ad"];
    //$parola = $_POST["parola"];
    extract($_POST); // bu satır yukarıdaki iki satırın yaptığı işi yapar :)
    // artık $ad ve $parola değişkenlerim var :)

    // SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır. Bunun sebebi GÜVENLİK'tir.
    $ad     = mysqli_real_escape_string($cnnMySQL, $ad);
    $parola = mysqli_real_escape_string($cnnMySQL, $parola);

    $SQL  = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$ad' and parola = '$parola' ";
    $rows = mysqli_query($cnnMySQL, $SQL);
    $RowCount = mysqli_num_rows($rows);

    if($RowCount == 1) {
      // Giriş BAŞARILI
      $row = mysqli_fetch_assoc($rows);
      session_start();
      $_SESSION["AKTIF_KULLANICI"] = $row["adi_soyadi"];
      $_SESSION["giris_yapti"] = "EVET";
      header("Location: sorular.php");
      die();
    } else {
      // Giriş BAŞARISIZ :(
      $HATAMESAJI = "Hatalı giriş";
    }

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
    <p>Kullanıcı Adınız: <input type="text" name="ad" ></p>
    <p>Kullanıcı Parolanız: <input type="password" name="parola" ></p>
    <input type="submit" value="Gönder!">
  </form>


</body>

</html>
