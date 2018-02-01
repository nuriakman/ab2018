<?php
  require_once("config/connection.php");
  require_once("config/kutuphanem.php");

      ## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
      ## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
      $ARANAN = $_GET["aranantext"];

      // SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır. Bunun sebebi GÜVENLİK'tir.
      $ARANAN = mysqli_real_escape_string($cnnMySQL, $ARANAN);

      $SQL = "SELECT * FROM araclar
              WHERE  marka   like '%$ARANAN%'
                  or donanim like '%$ARANAN%'
                  or model   like '%$ARANAN%'
                ";
      $rows = mysqli_query($cnnMySQL, $SQL);
      $RowCount = mysqli_num_rows($rows);
      echo "<h1><span style='color:darkred;'>$ARANAN</span> Arama Sonucu: <small>($RowCount sonuç)</small> </h1>";

      if($RowCount == 0) { // Kayıt yok...
        echo "Kayıt bulunamadı..";
      } else { // Kayıt var
        // Tablo başlığını yazdıralım
        echo "<table class='table table-hover table-condensed table-bordered'>
                <tr class='success'>
                    <th>SıraNo</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Motor</th>
                    <th>Vites</th>
                    <th>Yakıt</th>
                    <th>Fiyat</th>
                    <th>Donanım</th>
                 </tr>";
        $c=0;
        while($row = mysqli_fetch_assoc($rows)) {
          extract($row); // "Key" adında değişkenler oluştur :)
          $c++;
          // Tablo başlığını yazdıralım
          echo "<tr>
                  <td>$c</td>
                  <td>$marka</td>
                  <td>$model</td>
                  <td>$motor</td>
                  <td>$vites</td>
                  <td>$yakit</td>
                  <td>$fiyat</td>
                  <td>$donanim</td>
               </tr>";
        } // while
        echo "</table>";
      } // Kayıt var

  ?>
