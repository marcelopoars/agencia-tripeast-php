<?php

require_once('db_connect.php');

// Função para buscar todos os usuários cadastrados no banco de dados
function getAllUsers($connect)
{
  $query = "SELECT * FROM users";

  $execute = mysqli_query($connect, $query);

  return mysqli_fetch_all($execute, MYSQLI_ASSOC);
}

// Função para cadastrar usuário
function createUser($connect)
{
  if (isset($_POST['submited_create_user_form'])) {
    $name = trim(mysqli_real_escape_string($connect, $_POST['username']));
    $email = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
    $password = !empty($_POST['password']) ? md5(trim($_POST['password'])) : '';
    $userConfirmPassword = !empty($_POST['confirm-password']) ? md5(trim($_POST['confirm-password'])) : '';
    $_SESSION['errors'] = array();

    // Verifica se existe algum campo vazio
    $isValidInputs = (!empty($name) and !empty($email) and !empty($password) and !empty($userConfirmPassword));

    // Se todos os campos estiverem preenchidos, é realizada a consulta no banco de dados, para verificar se o usuário não existe na base de dados
    if ($isValidInputs) {
      $queryEmail = "SELECT email FROM users WHERE email = '$email'";
      $getEmail = mysqli_query($connect, $queryEmail);
      $numberRows = mysqli_num_rows($getEmail);

      // Verifica se encontrou o email na base de dados
      // Se encontrar, gera um erro
      if (!empty($numberRows)) {
        $_SESSION['errors'][] = "O email $email já está cadastrado.";
      }
    }

    // Verifica se as "Senha" e "Confirmar senha" são iguais
    if ($password != $userConfirmPassword) {
      $_SESSION['errors'][] = "As senhas precisam ser iguais.";
    }

    // Se algum campo estiver vazio gera um erro
    if (!$isValidInputs) {
      $_SESSION['errors'][] = "Todos os campos são obrigatórios.";
    }

    $errors = $_SESSION['errors'];

    // Caso não ocorra nenhum erro, é feito o cadastro do usuário na base de dados
    if (empty($errors) and $isValidInputs) {
      $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
      $execute = mysqli_query($connect, $query);

      if ($execute) {
        // Direciona o usuário para a página de "Usuário"
        header('location: usuarios.php');
      }
    }
  }
}
