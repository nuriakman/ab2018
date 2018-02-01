<?php
  include("sayfa_ust.php");

  // Sayfa içeriği burada gösterilecek...
  echo "<div class='container'>";
  include("../araba/arama.islemi.php");  // Araba arama fonksiyonunu "araba" dizini içindeki "arama.islemi.php" içinde yapmıştık. Onu buradan çağıralım...
  echo "</div>";

  include("sayfa_alt.php");
 ?>
