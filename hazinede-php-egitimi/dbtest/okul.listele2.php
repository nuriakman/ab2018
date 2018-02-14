<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$SQL = "SELECT distinct sehir, okul FROM okullar ORDER BY sehir, okul";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1>Üniversite Adları</h1>

<ol>
	<?php
		// ADIM 3
		while( $SATIR = mysqli_fetch_assoc($SONUC) ){
			// UZUN YOLU:
			// echo "<li><b>" . $SATIR["sehir"] . "</b> <i>" . $SATIR["okul"] . "</i></li>";
			
			echo sprintf("<li><b>%s</b> <i>%s</i></li>",
						$SATIR["sehir"], 
						$SATIR["okul"]) ;
		}
		// Burası, verinin tükendiği yerdir..
	?>
</ol>


