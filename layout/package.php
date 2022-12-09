<?php

function renderPackage($id, $destination, $hotel, $stars, $price, $departure_date, $date_back, $image)
{
  $renderStars = str_repeat("★", $stars); // ★★★★
  $formattedPrice = "R$ " . number_format($price, 2, ",", "."); // R$ 18.490,90
  $formatted_departure_date = date('d \d\e M\/Y', strtotime($departure_date)); // 30 de Nov de 2022
  $formatted_date_back = date('d \d\e M\/Y', strtotime($date_back)); // 30 de Nov de 2022
  $path_image = "uploads/$id/$image";
  $actions = "";
  
  if (isset($_SESSION['logged'])) {
    $actions = "
      <a class='actions edit' href='edit.php?id=$id'>Editar</a>
      <a class='actions delete' href='deletar-pacote.php?id=$id'>Deletar</a>
    ";
  }

  echo "
  <article class='package'>
    <header>
      <img src='$path_image' alt='$destination' />
      $actions
      <div>
        <h3>$destination</h3>
        <span class='airports'>POA - TLV</span>
      </div>
      <div>
        <strong>
          $hotel
          <span class='star'>$renderStars</span>
        </strong>
      </div>
    </header>

    <div class='details'>
      <p>A partir de: <span>$formattedPrice</span></p>
      <ul>
        <li>Em até 10x sem juros</li>
        <li>Taxas inclusas</li>
        <li>Preço por pessoa</li>
        <li>Café da manhã</li>
      </ul>
    </div>

    <footer>
      <div>
        <div class='round-trip'>
          <p><strong>IDA: </strong>$formatted_departure_date</p>
          <p><strong>VOLTA: </strong>$formatted_date_back</p>
        </div>
        <div class='airline'>
          <img src='resources/images/icons/logo-latam.png' alt='Logo Latam' />
          <small>Latam</small>
        </div>
      </div>

      <button class='default-button'>Comprar agora</button>
    </footer>
  </article>
  ";
}
