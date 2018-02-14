<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$SQL = "SELECT distinct sehir FROM okullar ORDER BY sehir";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1>Üniversiteleri Liste</h1>

<p>Lütfen üniversitelerini görmek istediğiniz şehir adına tıklayınız.</p>

<table border='1' cellspacing="0" cellpadding="5" >
	<?php
		// ADIM 3
		while( $SATIR = mysqli_fetch_assoc($SONUC) ){
	
			echo sprintf("<tr>
							<td>
								<b><a href='ildeki.okullar.php?sehiradi=%s'>%s</a></b>
							</td>
						  </tr>",
						$SATIR["sehir"],
						$SATIR["sehir"]
					) ;
		}
		// Burası, verinin tükendiği yerdir..
	?>
</table>


