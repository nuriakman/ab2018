<?php

	// Okulları listeleme 3 adımda yapılır.
	// 1. Bağlan
	// 2. SQL Çalıştır
	// 3. Sonuçları ekrana yaz

	// ADIM 1
	require("vt_baglan.php");

	// ADIM 2
	$OKULADI = $_GET["okul"];
	$SQL   = "select * from okullar where okul='$OKULADI' ";
	$SONUC = mysqli_query($VT, $SQL);
	// if(mysqli_num_rows($SONUC) > 0)
?>

<h1><b style='color:red;'><?php echo $OKULADI; ?></b> BÖLÜMLERİ</h1>

<table border='1' cellspacing="0" cellpadding="5" >
	<tr>
		<td style="background-color: yellow;"> <b>Fakülte Adı</b> </td>
		<td style="background-color: yellow;"> <b>Bölüm Adı</b> </td>
		<td style="background-color: yellow;"> <b>Puan Türü</b> </td>
		<td style="background-color: yellow;"> <b>Taban Puan</b> </td>
		<td style="background-color: yellow;"> <b>Sıralama</b> </td>
	</tr>

	<?php
		// ADIM 3
		while( $SATIR = mysqli_fetch_assoc($SONUC) ){
	
			echo sprintf("<tr>
							<td> %s </td>
							<td> <a href='bolum.detay.php?id=%s'>%s</a> </td>
							<td> %s </td>
							<td> %s </td>
							<td> %s </td>
						  </tr>",
						$SATIR["fakulte"], 
						$SATIR["id"], 
						$SATIR["bolum"],
						$SATIR["puan_turu"],
						$SATIR["taban_puan"],
						$SATIR["basari_sirasi"]
							
					) ;
		}
		// Burası, verinin tükendiği yerdir..
	?>
</table>


