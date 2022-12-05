<?php require_once('db_connect.php');

function login($connect)
{
  if (isset($_POST['submited_form_login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';
    $_SESSION['errors'] = array();

    $isValidInputs = (!empty($_POST['email']) and !empty($_POST['password']));

    if (!$isValidInputs) {
      $_SESSION['errors'][] = "Todos os campos são obrigatórios.";
    }

    if ($isValidInputs) {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

      $execute = mysqli_query($connect, $query);

      $result = mysqli_fetch_assoc($execute);

      if (!empty($result['email'])) {
        session_start();

        $_SESSION['name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['logged'] = true;

        header('location: index.php');
      } else {
        $_SESSION['errors'][] = "Usuário ou senha incorretos.";
      }
    }
  }
}
