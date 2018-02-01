<?php
  include("sayfa_ust.php");

  // Sayfa içeriği burada gösterilecek...
  echo "<div class='container'>";
  include("../araba/ara3.php"); // Araba arama fonksiyonunu "araba" dizini içindeki "ara3.php" içinde yapmıştık. Onu buradan çağıralım...
  echo "</div>";

  include("sayfa_alt.php");
 ?>
