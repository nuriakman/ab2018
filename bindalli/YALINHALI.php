
<!--
  Bu dosya, içinde bulunduğu dizindeki .jpg dosyalarını bulur ve
  ekrana her biri 250px yüksekliğinde olmak üzere listeler.
  Listelenen bu resimlere tıklandığında ise
  lightbox2 kütüphanesini kullanarak resimlerin ekranda
  hoş bir şekilde açılan pencere içinden gösterilmesini sağlar.
-->

<script src="lightbox/jquery-3.3.1.min.js"></script>
<link href="lightbox/lightbox.css" rel="stylesheet">
<script src="lightbox/lightbox.js"></script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>

<?php
  foreach (glob("*.jpg") as $dosya) { // Aktif klasör içindeki .jpg dosyalarını bul
    echo "
      <a  href='$dosya' data-lightbox='image' data-title='$dosya'>
      <img src='$dosya' height='250' style='margin: 5px;'>
      </a>
    ";
  }
?>
