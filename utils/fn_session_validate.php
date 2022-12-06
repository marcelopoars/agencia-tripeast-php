<?php

// Função para validar se o usuário está logado no sistema
function sessionValidate()
{
  if (!isset($_SESSION['logged'])) {
    // Caso usuário não esteja logado no sistema, o usuário é direcionado para a página "Entrar"
    header('location: entrar.php');
    exit;
  }
}
