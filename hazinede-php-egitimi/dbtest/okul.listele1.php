<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$SQL = "SELECT distinct okul FROM okullar ORDER BY okul";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1>Üniversite Adları</h1>

<ol>
	<?php
		// ADIM 3
		while( $SATIR = mysqli_fetch_assoc($SONUC) ){
			echo "<li>" . $SATIR["okul"] . "</li>";
		}
		// Burası, verinin tükendiği yerdir..
	?>
</ol>


