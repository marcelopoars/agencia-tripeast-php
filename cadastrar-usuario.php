<?php

session_start();

require_once('./utils/fn_session_validate.php');
require_once('./utils/fn_users.php');
require_once('./utils/fn_errors.php');
require_once('./layout/head.php');

sessionValidate();

unset($_SESSION['errors']);

$name = '';
$email = '';
$password = '';
$userConfirmPassword = '';

if (isset($_POST['submited_create_user_form'])) {
  $name = trim($_POST['username']);
  $email = $_POST['useremail'];
  $password = trim($_POST['password']);
  $userConfirmPassword = trim($_POST['confirm-password']);

  createUser($connect);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<!-- Renderiza HEAD  / necessário passar o nome da página -->
<?php renderHeadPage('Cadastrar usuário | tripEast') ?>

<body>

  <?php include_once('./layout/header.php') ?>

  <main>
    <section class="create-user">
      <div class="container">
        <h2>Cadastrar usuário</h2>

        <form class="form" action="" method="post">
          <div class="input-group">
            <label for="username">Nome</label>
            <input type="text" id="username" name="username" value="<?php echo $name ?>">
          </div>

          <div class="input-group">
            <label for="useremail">Email</label>
            <input type="email" id="useremail" name="useremail" value="<?php echo $email ?>">
          </div>

          <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="••••••••••" value="<?php echo $password ?>">
            <span class="password-visibility-toggle">Exibir</span>
          </div>

          <div class="input-group">
            <label for="confirm-password">Confirmar senha</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="••••••••••" value="<?php echo $userConfirmPassword ?>">
            <span class="confirm-password-visibility-toggle">Exibir</span>
          </div>

          <button class="default-button" type="submit" name="submited_create_user_form">Cadastrar usuário</button>
        </form>

        <!-- Chamada para a função que vai renderizar os erros se houver -->
        <?php renderErrors() ?>

      </div>
    </section>
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
