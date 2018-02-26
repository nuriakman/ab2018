<?php
  if(isset($_POST["parola"])) { // Form submit edilmiş...

    // echo "<pre>"; print_r($_POST); echo "</pre>"; die();

    // 1.) veritabanına bağlan
    // 2.) Bilgiler ile birlikte kauydı ekle
    // 3.) İşlem tamam mesajını ver.

    require_once("config/connection.php");
    //$ad     = $_POST["ad"];
    //$parola = $_POST["parola"];
    extract($_POST); // bu satır yukarıdaki iki satırın yaptığı işi yapar :)
    // artık $ad ve $parola değişkenlerim var :)

    $adi_soyadi    = mysqli_real_escape_string($cnnMySQL, $adi_soyadi);
    $kullanici_adi = mysqli_real_escape_string($cnnMySQL, $kullanici_adi);
    $parola        = mysqli_real_escape_string($cnnMySQL, $parola);
    $rol           = mysqli_real_escape_string($cnnMySQL, $rol);

    $SQL = "INSERT INTO kullanicilar (kullanici_adi, adi_soyadi, parola, rol)
            VALUES ( '$kullanici_adi', '$adi_soyadi', '$parola', '$rol' )";
    $rows = mysqli_query($cnnMySQL, $SQL);
    header("Location: kullanici.yonetimi.php");
    die();
  } // Form gönderilmiş ise...
?>
<!DOCTYPE HTML>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Kullanıcı Ekle</title>
</head>
<body>

  <h1>Kullanıcı Ekle</h1>
  <?php
    if( $HATAMESAJI != "") {
      echo "<h3 style='color:red;'>$HATAMESAJI</h3>";
    }
  ?>

  <form method="post">
    <p>Adı Soyadı: <input type="text" name="adi_soyadi" ></p>
    <p>Login Adı: <input type="text" name="kullanici_adi" ></p>
    <p>Parola: <input type="password" name="parola" ></p>
    <p>Rol: <select name="rol" >
              <option value="1">Yönetici</option>
              <option value="2" selected>Kullanıcı</option>
            </select>
    </p>
    <input type="submit" value="Kullanıcıyı Ekle!">
  </form>


</body>

</html>
