<?php
  require_once("config/connection.php");
  require_once("config/kutuphanem.php");
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Araba Arama</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!--[if lt IE 9]>-
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <h1>Arama Yapın...</h1>
    <form method="get">
      <p>
        Fiyat Aralığı:
        <input type="text" name="alt"> -
        <input type="text" name="ust">
      </p>
      <p>
        Marka
        <select name="marka">
        <option value="(HEPSI)">Farketmez</option>
        <?php echo GetHTMLSelectTagData("SELECT DISTINCT marka FROM araclar ORDER BY marka", "marka"); ?>
      </select>
      </p>
      <p>
        Vites Türü
        <select name="vites">
        <option value="(HEPSI)">Farketmez</option>
        <?php echo GetHTMLSelectTagData("SELECT DISTINCT vites FROM araclar ORDER BY vites", "vites"); ?>
      </select>
      </p>
      <p>
        Yakıt Türü
        <select name="yakit">
        <option value="(HEPSI)">Farketmez</option>
        <?php echo GetHTMLSelectTagData("SELECT DISTINCT yakit FROM araclar ORDER BY yakit", "yakit"); ?>
      </select>
      </p>
      <p>
        <input type="submit" value="Getir !">
      </p>
    </form>


<?php
    if( isset($_GET["vites"]) ) { // Form SUBMIT edilmiş
      //echo "Fiyat Alt Sınırı: " . $_GET["alt"];
      //echo "<pre>"; print_r( $_GET ); echo "</pre>";
      //echo "YAKIT: $yakit<br>";
      extract($_GET); // "Key" adında değişkenler oluştur :)
      //echo "YAKIT: $yakit";

      // SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır. Bunun sebebi GÜVENLİK'tir.
      $marka = mysqli_real_escape_string($cnnMySQL, $marka);
      $vites = mysqli_real_escape_string($cnnMySQL, $vites);
      $yakit = mysqli_real_escape_string($cnnMySQL, $yakit);
      $alt = mysqli_real_escape_string($cnnMySQL, $alt);
      $ust = mysqli_real_escape_string($cnnMySQL, $ust);

      $Kosul = "SELECT * FROM araclar WHERE ";
      if( $marka <> "(HEPSI)" ) $Kosul .= " marka = '$marka' AND ";
      if( $vites <> "(HEPSI)" ) $Kosul .= " vites = '$vites' AND ";
      if( $yakit <> "(HEPSI)" ) $Kosul .= " yakit = '$yakit' AND ";
      if( $alt > 0 ) $Kosul .= " fiyat BETWEEN '$alt' and '$ust' AND ";

      $Kosul .= " 1  ";
      //echo "<h1>Üretilen SQL: </h1>";
      //echo "<h4>$Kosul</h4>";



      ## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
      ## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
      $SQL = $Kosul;
      $rows = mysqli_query($cnnMySQL, $SQL);
      $RowCount = mysqli_num_rows($rows);
      echo "<h1>Arama Sonucu: <small>($RowCount Adet Araç Listeleniyor)</small> </h1>";

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
               </tr>";
        } // while
        echo "</table>";
      } // Kayıt var



    }
  ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
