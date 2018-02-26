<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "root";
$database = "ab2018";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");


## html select etiketi için tek sutun verinin çekilmesi
## html select etiketi için tek sutun verinin çekilmesi
function GetHTMLSelectTagData( $SQL, $SahaAdi ){
  // Örnek Kullanım:
  // echo GetHTMLSelectTagData("SELECT DISTINCT marka FROM araclar ORDER BY marka", "marka");
  global $cnnMySQL;
  $rows = mysqli_query($cnnMySQL, $SQL);
  $RowCount = mysqli_num_rows($rows);
  $SONUC = "";
  while($row = mysqli_fetch_assoc($rows)){
    $SONUC .= sprintf("<option value='%s'>%s</option>",
                $row["$SahaAdi"], $row["$SahaAdi"]  );
  }
  return $SONUC;
} // GetHTMLSelectTagData



## Veritabanına kayıt ekleme
## Veritabanına kayıt ekleme
$val1 = "AAA";
$val2 = "BBB";
$val3 = 45000;

// SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır.
// Bunun sebebi GÜVENLİK'tir.
$val1 = mysqli_real_escape_string($cnnMySQL, $val1);
$val2 = mysqli_real_escape_string($cnnMySQL, $val2);
$val3 = mysqli_real_escape_string($cnnMySQL, $val3);

$SQL = "INSERT INTO araclar (marka, model, fiyat)
        VALUES ( '$val1', '$val2', '$val3' )";
$rows = mysqli_query($cnnMySQL, $SQL);


## Veritabanına kayıt güncelleme
## Veritabanına kayıt güncelleme

$val1 = "AaAaAa";
$val2 = "BbBbBb";
$val3 = 75000;

// SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır.
// Bunun sebebi GÜVENLİK'tir.
$val1 = mysqli_real_escape_string($cnnMySQL, $val1);
$val2 = mysqli_real_escape_string($cnnMySQL, $val2);
$val3 = mysqli_real_escape_string($cnnMySQL, $val3);

$SQL = "UPDATE araclar SET
          marka = '$val1',
          model = '$val2',
          fiyat = '$val3'
        WHERE id=1678";
$rows = mysqli_query($cnnMySQL, $SQL);



## Veritabanından kayıt silme
## Veritabanından kayıt silme
$SQL = "DELETE FROM araclar WHERE id = 1";
$rows = mysqli_query($cnnMySQL, $SQL);



## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
## Veritabanından kayıt çekme ve TABLE ile listeleme örneği
$SQL = "SELECT marka, model FROM araclar LIMIT 20";
$rows = mysqli_query($cnnMySQL, $SQL);
$RowCount = mysqli_num_rows($rows);
if($RowCount == 0) { // Kayıt yok...
  echo "Kayıt bulunamadı..";
} else { // Kayıt var
  // Tablo başlığını yazdıralım
  echo "<table class='table table-hover'>
          <tr>
              <th>SıraNo</th>
              <th>Markası</th>
              <th>Modeli</th>
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
         </tr>";
  } // while
  echo "</table>";
} // Kayıt var
