<?php
## html select etiketi için tek sutun verinin çekilmesi
## html select etiketi için tek sutun verinin çekilmesi
function GetHTMLSelectTagData( $SQL, $SahaAdi ){
  // Örnek Kullanım:
  // echo GetHTMLSelectTagData("SELECT DISTINCT marka FROM araclar ORDER BY marka", "marka");
  global $cnnMySQL;
  $rows = mysqli_query($cnnMySQL, $SQL);
  $SONUC = "";
  while($row = mysqli_fetch_assoc($rows)){
    $SONUC .= sprintf("<option value='%s'>%s</option>",
                $row["$SahaAdi"], $row["$SahaAdi"]  );
  }
  return $SONUC;
} // GetHTMLSelectTagData


## Bir DİZİ içinde neler olduğunun ekrana yazdırılması (Dump Data)
## Bir DİZİ içinde neler olduğunun ekrana yazdırılması (Dump Data)
function dd($degisken) {
  echo "<pre>";
  print_r($degisken);
  echo "</pre>";
} // dd
