<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$SEHIR = $_GET["sehiradi"];
	$SQL = "SELECT distinct sehir, okul FROM okullar WHERE sehir='$SEHIR' ";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1><?php echo $SEHIR; ?> Üniversiteleri</h1>

<table border='1' cellspacing="0" cellpadding="5" >
	<?php
		// ADIM 3
		while( $SATIR = mysqli_fetch_assoc($SONUC) ){
	
			echo sprintf("<tr>
							<td>
								<b>%s</b>
							</td>
							<td>
								<i><a href='bolum.listele.php?okul=%s'>%s</a></i>
							</td>
						  </tr>",
						$SATIR["sehir"], 
						$SATIR["okul"],
						$SATIR["okul"]) ;
		}
		// Burası, verinin tükendiği yerdir..
	?>
</table>


