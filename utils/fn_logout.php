<?php

// Arquivo responsável pelo logout do usuário
// Encerra a sessão e direciona o usuário para a página home do site
session_start();
session_unset();
session_destroy();

header('location: ../index.php');
