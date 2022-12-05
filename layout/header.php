<?php

$login_logout_label = 'Entrar';
$login_logout_link = 'entrar.php';
$user = '';

if (isset($_SESSION['logged'])) {
  $login_logout_label = 'Sair';
  $login_logout_link = 'utils/fn_logout.php';
  $user = "Olá {$_SESSION['name']} | ";
}

?>
<!-- HEADER  -->
<header class="header-wrapper">
  <div class="header-1">
    <div class="container">
      <span>Central de atendimento: 0800 444 9999</span>
      <ul>
        <li>
          <?php echo $user ?>
          <a href="<?php echo $login_logout_link ?>"><?php echo $login_logout_label ?></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="header-2">
    <div class="container">
      <div class="logo">
        <a href="index.php">
          <strong>Trip<span>East</span></strong>
        </a>
      </div>

      <!-- ICONE DE MENU -->
      <!-- Atributos 'ARIA' para melhorar a acessibilidade -->
      <button id="button-menu" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu" aria-haspopup="true">
        &#9776;
      </button>

      <nav id="menu" role="menu">
        <ul>
          <?php

          if (isset($_SESSION['logged'])) {
            include_once('./layout/menu-admin.php');
          }
          include_once('./layout/menu.php');
          ?>
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- END HEADER -->
