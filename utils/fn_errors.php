<?php

// Função para renderizar os erros nos formulários
function renderErrors()
{
  $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

  if (!empty($errors)) {
    echo "<div><ul>";
    foreach ($errors as $error) {
      echo "<li class='message error'>$error</li>";
    }
    echo "</ul></div>";
  }
}
