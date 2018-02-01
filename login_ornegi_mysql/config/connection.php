<?php
## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "root";
$database = "ab2018";
$cnnMySQL = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
