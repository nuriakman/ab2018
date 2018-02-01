<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- Navbar -->
  <!-- Navbar -->
  <!-- Navbar -->
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Daha iyi mobil görüntü için marka ve aç/kapa gruplanıyor -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Navigasyonu aç/kapa</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">OTO GALERİ</a>
          </div>
          <!-- Aç/kapa için nav kısayollarını, formu ve diğer içeriği bir araya topla -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Anasayfa <span class="sr-only">(current)</span></a></li>
              <li><a href="arababul.php">Araba Bul!</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search" method="get" action="arama.sonucu.goster.php">
              <div class="form-group">
                <input type="text" class="form-control" name="aranantext" placeholder="Ara">
              </div>
              <button type="submit" class="btn btn-default">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">İletişim</a></li>
            </ul>
          </div>
          <!-- /.navbar-aç/kapa -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </div>
  </div>
  <!-- /Navbar -->
  <!-- /Navbar -->
  <!-- /Navbar -->
