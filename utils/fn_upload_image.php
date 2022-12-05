<?php

require_once('db_connect.php');

function uploadImage($lastPackageId, $image_tmp_name, $image)
{
  $package_image_directory = "uploads/$lastPackageId/";

  mkdir($package_image_directory, 0755);

  move_uploaded_file($image_tmp_name, $package_image_directory . $image);
}
