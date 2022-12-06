<?php

require_once('db_connect.php');

// Função de upload de imagem
function uploadImage($lastPackageId, $image_tmp_name, $image)
{
  $package_image_directory = "uploads/$lastPackageId/";

  // Cria um diretório com o ID do pacote cadastrado
  mkdir($package_image_directory, 0755);

  // Move a imagem selecionada para dentro do diretório recém criado
  move_uploaded_file($image_tmp_name, $package_image_directory . $image);
}
