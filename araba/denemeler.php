<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Sorular</title>
</head>
<body>
<h1>MySQL Denemelerim</h1>

<?php
  // Bağlantı kur
  $link = mysqli_connect("localhost", "root", "root", "ab2018");

  // Bağlantıda sorun var mı?
  if($link === false)   die("HATA: Bağlantı kurulamadı");

  // Veritabanından kayıt çekelim... Önce sorgumuzu yazalım
  $sql = "SELECT * FROM araclar ORDER BY id DESC -- LIMIT 5";

  // Sorgumuzu MySQL üzerinde çalıştıralım..
  $result = mysqli_query($link, $sql);

  // Kaç kayıt yakalandığını öğrenelim.
  $KayitAdedi = mysqli_num_rows($result);

  // Bunu ekrana yazalım...
  echo "$KayitAdedi adet kayıt bulundu...";

  echo "<table border=1 cellpadding=2 cellspacing=0>
        <tr>
          <td>Marka</td>
          <td>Model</td>
          <td>Fiyat</td>
        </tr>";

  // Her bir kayıt için sırayla verilerin okunması (getirilmesi)
  // ve ekrana listelemenin yapılması
  while($row = mysqli_fetch_assoc($result)){ // DB'deb 1 satır getir
    //echo "<pre>";  print_r($row);  echo "<pre>"; // Sonucu incelemek için
    // Gelen verinin ekrana yazdırılması

    // Örnek çıktı alma
    //  echo sprintf("<p>Kayıt No: %s, <b>Marka:</b> %s, Modeli: %s, Fiyatı: %s</p>",
    //        $row["id"], $row["marka"], $row["model"], $row["fiyat"] );

    // TABLO ile ekrana yazdıralım

    echo sprintf("<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                  </tr> ",
                $row["marka"],
                $row["model"],
                $row["fiyat"]
                );
  }

  echo "</table>";

  // Bağlantıyı kapat
  mysqli_close($link);
?>



</body>

</html>
