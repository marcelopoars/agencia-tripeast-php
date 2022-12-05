<?php

require_once('./utils/fn_login.php');
require_once('./utils/fn_errors.php');
require_once('./layout/head.php');

$email = '';
$password = '';

if (isset($_POST['submited_form_login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  login($connect);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php renderHeadPage('Entrar | tripEast') ?>

<body>

  <?php include_once('./layout/header.php') ?>

  <main>
    <!-- CREATE PACKAGE -->
    <section class="login">
      <div class="container">
        <h2>Login</h2>
        <form class="form" action="" method="POST">

          <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>" placeholder="email@exemplo.com.br">
          </div>

          <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" value="<?php echo $password ?>" placeholder="••••••••••">
            <span class="password-visibility-toggle">Exibir</span>
          </div>

          <button class="default-button" type="submit" name="submited_form_login">Entrar</button>
        </form>

        <div>
          <?php renderErrors() ?>
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

  <!-- SCRIPT MENU -->
  <script src="resources/js/menu.js"></script>
  <script src="resources/js/passwordVisibilityToggle.js"></script>
</body>

</html>
