<?php

session_start();

include_once('./layout/head.php');

include_once('./layout/package.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php renderHeadPage('tripEast | Agência de turismo') ?>

<body>

  <?php include_once('./layout/header.php') ?>

  <main>
    <?php
    // HERO
    include('./layout/hero.php');

    // TRAVEL PACKAGES
    include('./layout/packages.php');

    // COMMENTS
    include('./layout/comments.php');

    // GALLERY
    include('./layout/gallery.php');

    // NEWSLETTER
    include('./layout/newsletter.php');
    ?>
  </main>

  <footer class="footer">
    <?php
    include_once("./layout/footer-company.php");
    include_once("./layout/footer-copy.php");
    ?>
  </footer>

  <!-- SCRIPT MENU -->
  <script src="resources/js/menu.js"></script>
</body>

</html>
