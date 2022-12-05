<?php

require_once('db_connect.php');

function getAllUsers($connect)
{
  $query = "SELECT * FROM users";

  $execute = mysqli_query($connect, $query);

  return mysqli_fetch_all($execute, MYSQLI_ASSOC);
}


function createUser($connect)
{
  if (isset($_POST['submited_create_user_form'])) {
    $name = mysqli_real_escape_string($connect, $_POST['username']);
    $email = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
    $password = !empty($_POST['password']) ? md5($_POST['password']) : '';
    $userConfirmPassword = !empty($_POST['confirm-password']) ? md5($_POST['confirm-password']) : '';
    $_SESSION['errors'] = array();

    $isValidInputs = (!empty($name) and !empty($email) and !empty($password) and !empty($userConfirmPassword));

    if ($isValidInputs) {
      $queryEmail = "SELECT email FROM users WHERE email = '$email'";
      $getEmail = mysqli_query($connect, $queryEmail);
      $numberRows = mysqli_num_rows($getEmail);

      if (!empty($numberRows)) {
        $_SESSION['errors'][] = "O email $email já está cadastrado.";
      }
    }

    if ($password != $userConfirmPassword) {
      $_SESSION['errors'][] = "As senhas precisam ser iguais.";
    }

    if (!$isValidInputs) {
      $_SESSION['errors'][] = "Todos os campos são obrigatórios.";
    }

    $errors = $_SESSION['errors'];

    if (empty($errors) and $isValidInputs) {
      $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
      $execute = mysqli_query($connect, $query);

      if ($execute) {
        header('location: usuarios.php');
      }
    }
  }
}
