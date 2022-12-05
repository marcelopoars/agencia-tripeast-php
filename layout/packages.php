<?php
require('./utils/fn_packages.php');

$packages = getAllPackages($connect);

?>

<section id="packages" class="packages">
  <div class="container">
    <h2>Pacotes</h2>
    <p>
      Tarifas postadas em 05/11/2022 às 19:00. Sujeitas à disponibilidade.
      Valor total final para 1 passageiro adulto, já incluido todas as
      taxas e encargos.
    </p>
  </div>

  <div class="packages-container container">
    <?php
    foreach ($packages as $package)
      renderPackage(
        $package['id'],
        $package['destination'],
        $package['hotel'],
        $package['hotel_stars'],
        $package['price'],
        $package['departure_date'],
        $package['date_back'],
        $package['image']
      );
    ?>
  </div>
</section>
