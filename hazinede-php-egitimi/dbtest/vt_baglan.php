<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'ab2018');

    $VT = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // KISA KULLANIM ÖRNEĞİ:
	// $VT = mysqli_connect("localhost", "root", "root", "ab208");
    
    if($VT === false){
        die("Bağlantı hatası : " . mysqli_connect_error());
    }
    
?>