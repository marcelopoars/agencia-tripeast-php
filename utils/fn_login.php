<?php require_once('db_connect.php');

// Função para efetuar e validar o login de usuário
function login($connect)
{
  if (isset($_POST['submited_form_login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';
    $_SESSION['errors'] = array();

    // Verifica se existe algum campo vazio no formulário
    $isValidInputs = (!empty($_POST['email']) and !empty($_POST['password']));

    // Se algum campo estiver vazio, gera um erro
    if (!$isValidInputs) {
      $_SESSION['errors'][] = "Todos os campos são obrigatórios.";
    }

    // Se todos os campos estiverem preenchidos, faz a consulta do banco de dados
    if ($isValidInputs) {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

      $execute = mysqli_query($connect, $query);

      $result = mysqli_fetch_assoc($execute);

      // Se não houver nenhum erro é feita a autenticação
      // e permite e se inica a sessão
      if (!empty($result['email'])) {
        session_start();

        $_SESSION['name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['logged'] = true; // variável para controle de acesso do usuário

        // Após logar, direciona usuário para página inicial
        header('location: index.php');
      } else {
        $_SESSION['errors'][] = "Usuário ou senha incorretos.";
      }
    }
  }
}
