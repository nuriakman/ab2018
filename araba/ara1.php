<?php




$link = mysqli_connect("localhost", "root", "root", "ab2018");
if($link === false)   die("HATA: Bağlantı kurulamadı");

// MARAKALARI GETİR
$sql = "SELECT DISTINCT marka FROM araclar ORDER BY marka";
$result = mysqli_query($link, $sql);
$Markalar = "";
while($row = mysqli_fetch_assoc($result)){
  $Markalar .= sprintf("<option value='%s'>%s</option>",
              $row["marka"], $row["marka"]);
}

// VİTES GETİR
$sql = "SELECT DISTINCT vites FROM araclar ORDER BY vites";
$result = mysqli_query($link, $sql);
$Vitesler = "";
while($row = mysqli_fetch_assoc($result)){
  $Vitesler .= sprintf("<option value='%s'>%s</option>",
              $row["vites"], $row["vites"]);
}

// YAKIT GETİR
$sql = "SELECT DISTINCT yakit FROM araclar ORDER BY yakit";
$result = mysqli_query($link, $sql);
$Yakitlar = "";
while($row = mysqli_fetch_assoc($result)){
  $Yakitlar .= sprintf("<option value='%s'>%s</option>",
              $row["yakit"], $row["yakit"]);
}

 ?>

<!DOCTYPE html>
<html lang="en">

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
  <?php
  if( isset($_GET["vites"]) ) { // Form SUBMIT edilmiş
    // echo "Fiyat Alt Sınırı: " . $_GET["alt"];
    // echo "<pre>"; print_r( $_GET ); echo "</pre>";
    $marka = $_GET["marka"];
    $yakit = $_GET["yakit"];
    $vites = $_GET["vites"];
    $alt = $_GET["alt"];
    $ust = $_GET["ust"];

    $Kosul = "SELECT * FROM araclar WHERE ";
    if( $marka <> "(HEPSI)" ) $Kosul .= " marka = '$marka' AND ";
    if( $vites <> "(HEPSI)" ) $Kosul .= " vites = '$vites' AND ";
    if( $yakit <> "(HEPSI)" ) $Kosul .= " yakit = '$yakit' AND ";
    if( $alt > 0 ) $Kosul .= " fiyat BETWEEN '$alt' and '$ust' AND ";

    $Kosul .= " 1  ";
    echo "<h1>Üretilen SQL: </h1>";
    echo "<h4>$Kosul</h4>";

  }
?>


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
        <?php echo $Markalar; ?>
      </select>
      </p>
      <p>
        Vites Türü
        <select name="vites">
        <option value="(HEPSI)">Farketmez</option>
        <?php echo $Vitesler; ?>
      </select>
      </p>
      <p>
        Yakıt Türü
        <select name="yakit">
        <option value="(HEPSI)">Farketmez</option>
        <?php echo $Yakitlar; ?>
      </select>
      </p>
      <p>
        <input type="submit" value="Getir !">
      </p>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
