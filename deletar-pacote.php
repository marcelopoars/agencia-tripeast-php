<?php

session_start();

require_once('./utils/fn_packages.php');
require_once('./utils/fn_session_validate.php');

sessionValidate();

$packageId = filter_input(INPUT_GET, "package_id", FILTER_SANITIZE_NUMBER_INT);

// Se usuário não enviar um ID pela URL, direciona usuário para página inicial
if (empty($packageId)) {
    header('location: index.php');

    exit();
} else {
    $packageIdToBeDeleted = getPackageById($connect, $packageId);

    // Verifica se o id existe no banco de dados
    if (!empty($packageIdToBeDeleted['id'])) {
        // Se encontrar o pacote no banco, executa a função de DELETAR pacote
        deletePackage($connect, $packageId);
        // Direciona usuário para a página inicial / sessão de pacotes
        header('location: index.php#packages');
    } else {
        // Se não encontrar no banco de dados o ID digitado na URL, direciona o usuário para página inicial
        header('location: index.php');
    }
}
