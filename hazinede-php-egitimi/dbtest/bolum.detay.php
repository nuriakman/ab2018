<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$ID = $_GET["id"];
	$SQL   = "select * from okullar where id='$ID' ";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1>BÖLÜM DETAYLARI</h1>

<table border='1' cellspacing="0" cellpadding="5" >
	<?php
		// ADIM 3
		$SATIR = mysqli_fetch_assoc($SONUC);
		foreach ($SATIR as $SutunAdi => $Degeri) {
			echo sprintf("<tr>
							<td> <b>%s</b> </td>
							<td> %s </td>
						  </tr>",
						$SutunAdi, 
						$Degeri
					) ;
		}
		// Burası, verinin tükendiği yerdir..
	?>
</table>


