<?php //require("giris.kontrolu.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Kullanıcı Yönetimi</title>
</head>
<body>
<h1>Kullanıcı Yönetimi</h1>


    <?php
      require_once("config/connection.php");
      $SQL = "SELECT * FROM kullanicilar ORDER BY rol, id";
      $rows = mysqli_query($cnnMySQL, $SQL);
      $RowCount = mysqli_num_rows($rows);
      if($RowCount == 0) { // Kayıt yok...
        echo "Kayıt bulunamadı...";
      } else { // Kayıt var
        // Tablo başlığını yazdıralım
        echo "<table border='1' cellpadding='5' cellspacing='0'>
              <tr>
                  <th>Sıra No</th>
                  <th>Adı Soyadı</th>
                  <th>Login Adı</th>
                  <th>Rolü</th>
                  <th colspan='2'>İşlem</th>
              </tr> ";
        $c=0;
        while($row = mysqli_fetch_assoc($rows)) {
          extract($row); // "Key" adında değişkenler oluştur :)
          $c++;
          // Tablo verilerini yazdıralım
          echo "<tr>
                    <td>$c</td>
                    <td>$adi_soyadi</td>
                    <td>$kullanici_adi</td>
                    <td>$rol</td>
                    <td><a href='#'>Düzenle</a></td>
                    <td><a href='#'>Sil</a></td>
                </tr>";
        } // while
        echo "</table>";
      } // Kayıt var

    ?>



  </table>
<p><a href="#">Yeni Kayıt Ekle...</a></p>

<p>&nbsp;</p>
<p><a href="sorular.php">Geri Dön...</a></p>

</body>

</html>
