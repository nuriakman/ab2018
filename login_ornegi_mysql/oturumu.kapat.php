<?php
  session_start();
  // Bu değişkeni bellekten silelim...
  unset($_SESSION["giris_yapti"]);
  header("location: index.php");
?>
