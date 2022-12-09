<?php

require_once('db_connect.php');

// Função de upload de imagem
function uploadImage($lastPackageId, $image_tmp_name, $image)
{

  $package_image_directory = "uploads/$lastPackageId/";

  array_map('unlink', glob("$package_image_directory*.jpg"));

  if (!is_dir($package_image_directory)) {
    // Cria um diretório do pacote
    mkdir($package_image_directory, 0777);
  }

  // Move a imagem selecionada para dentro do diretório recém criado
  move_uploaded_file($image_tmp_name, $package_image_directory . $image);
}
