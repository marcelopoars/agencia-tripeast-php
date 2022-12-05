<?php

session_start();

require_once('./utils/fn_session_validate.php');
require_once('./utils/fn_users.php');
require_once('./layout/head.php');

sessionValidate();

unset($_SESSION['errors']);

$users = getAllUsers($connect);

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php renderHeadPage('Usuários | tripEast') ?>

<body>

  <?php include_once('./layout/header.php') ?>

  <main>
    <section class="users">
      <div class="container">
        <div class="users-table">
          <h2>Usuários</h2>
          <table>
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) { ?>
                <tr>
                  <td><?php echo $user['id'] ?></td>
                  <td><?php echo $user['name'] ?></td>
                  <td><?php echo $user['email'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <?php
    include_once("./layout/footer-copy.php");
    ?>
  </footer>
</body>

</html>
