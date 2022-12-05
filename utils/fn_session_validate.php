<?php

function sessionValidate()
{
  if (!isset($_SESSION['logged'])) {
    header('location: entrar.php');
    exit;
  }
}
