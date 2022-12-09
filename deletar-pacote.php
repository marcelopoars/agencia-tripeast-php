<?php

session_start();

require_once('./utils/fn_packages.php');
require_once('./utils/fn_session_validate.php');

sessionValidate();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
    $_SESSION['errors'][] = "Pacote não encontrado!";

    header('location: index.php');

    exit();
} else {
    $package_id = getPackageById($connect, $id);

    if (!empty($package_id['id'])) {
        deletePackage($connect, $id);

        header('location: index.php#packages');
    } else {
        header('location: index.php');
    }
}
