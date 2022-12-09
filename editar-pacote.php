<?php

session_start();

require_once('./utils/fn_session_validate.php');
require_once('./utils/fn_packages.php');
require_once('./utils/fn_errors.php');
require_once('./layout/head.php');

sessionValidate();

unset($_SESSION['errors']);

$packageId = filter_input(INPUT_GET, "package_id", FILTER_SANITIZE_NUMBER_INT);
$destination = '';
$hotel = '';
$hotel_stars = '';
$price = '';
$departure_date = '';
$date_back = '';
$image = '';
$packageUdited = false;

// Se usuário não enviar um ID pela URL, direciona usuário para página inicial
if (empty($packageId)) {
  header('location: index.php');

  exit();
} else {
  $packageIdToBeEdited = getPackageById($connect, $packageId);

  // Verifica se o id existe no banco de dados
  if (!empty($packageIdToBeEdited['id'])) {
    $packageResult = getPackageById($connect, $packageId);

    $destination = $packageResult['destination'];
    $hotel = $packageResult['hotel'];
    $hotel_stars = $packageResult['hotel_stars'];
    $price = $packageResult['price'];
    $departure_date = $packageResult['departure_date'];
    $date_back = $packageResult['date_back'];
    $image = $packageResult['image'];
  } else {
    // Se não encontrar no banco de dados o ID digitado na URL, direciona o usuário para página inicial
    header('location: index.php');
  }
}

if (isset($_POST['submited_edited_package_form'])) {
  $destination = $_POST['destination'];
  $hotel = $_POST['hotel'];
  $hotel_stars = $_POST['hotel_stars'];
  $price = $_POST['price'];
  $departure_date = $_POST['departure_date'];
  $date_back = $_POST['date_back'];
  $image = $_FILES['image']['name'];

  $packageUdited = editPackage($connect, $packageId);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<!-- Renderiza HEAD  / necessário passar o nome da página -->
<?php renderHeadPage('Editar pacote | tripEast') ?>

<body>

  <?php include_once('./layout/header.php') ?>

  <main>
    <!-- CREATE PACKAGE -->
    <section class="create-package">
      <div class="container">
        <div class="form-container">
          <h2>Editar pacote</h2>

          <form class="form" method="post" enctype="multipart/form-data">
            <div class="input-group">
              <label for="destination">Destino</label>
              <input type="text" id="destination" name="destination" value="<?php echo $destination ?>">
            </div>

            <div class="input-group-inline">
              <div class="input-group flex-1">
                <label for="hotel">Hotel</label>
                <input type="text" id="hotel" name="hotel" value="<?php echo $hotel ?>">
              </div>

              <div class="input-group">
                <label for="hotel_stars">Clasificação</label>
                <select name="hotel_stars" id="hotel_stars">
                  <option value="">Selecione</option>
                  <option value="2">1 estrelas ★</option>
                  <option value="2">2 estrelas ★★</option>
                  <option value="3">3 estrelas ★★★</option>
                  <option value="4">4 estrelas ★★★★</option>
                  <option value="5">5 estrelas ★★★★★</option>
                </select>
              </div>
            </div>

            <div class="input-group-inline">
              <div class="input-group">
                <label for="departure_date">Ida</label>
                <input type="date" id="departure_date" name="departure_date" value="<?php echo $departure_date ?>">
              </div>

              <div class="input-group">
                <label for="date_back">Volta</label>
                <input type="date" id="date_back" name="date_back" value="<?php echo $date_back ?>">
              </div>
            </div>

            <div class="input-group">
              <label for="price">Preço</label>
              <input type="text" id="price" name="price" value="<?php echo $price ?>">
            </div>

            <div class="input-group">
              <label for="image">Imagem</label>
              <input type="file" id="image" name="image">
            </div>

            <button class="default-button" type="submit" name="submited_edited_package_form">Editar pacote</button>
          </form>

          <?php

          if ($packageUdited) {
            echo "<div><ul><li class='message success'>Pacote editado com sucesso!</li></ul></div>";
          }
          //Chamada para a função que vai renderizar os erros se houver
          renderErrors();
          ?>
        </div>

        <div class="package-preview">
          <h2>Preview do pacote editado</h2>

          <?php if ($packageUdited) {
            renderPackage($packageId, $destination, $hotel, $hotel_stars, $price, $departure_date, $date_back, $image);
          } else {
            echo "Você vai visualizar aqui o pacote editado.";
          } ?>

        </div>
      </div>

    </section>
    <!-- END CREATE PACKAGE -->
  </main>

  <footer class="footer">
    <?php
    include_once("./layout/footer-copy.php");
    ?>
  </footer>

  <script>
    const date = new Date();
    const today = date.toLocaleDateString('pt-br');

    function formatDate(date) {
      return (date.substr(0, 10).split('/').reverse().join('-'));
    }

    const departureDate = document.querySelector("#departure_date");
    const dateBack = document.querySelector("#date_back");

    departureDate.setAttribute("min", formatDate(today));
    dateBack.setAttribute("min", formatDate(today));
  </script>

</body>

</html>
