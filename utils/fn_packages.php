<?php

require_once('db_connect.php');
require_once('fn_upload_image.php');
require_once('./layout/package.php');

function getAllPackages($connect)
{
  $query = "SELECT * FROM packages";

  $execute = mysqli_query($connect, $query);

  return mysqli_fetch_all($execute, MYSQLI_ASSOC);
}

function createPackage($connect)
{
  if (isset($_POST['submited_created_package_form'])) {
    $destination = mysqli_real_escape_string($connect, $_POST['destination']);
    $hotel = mysqli_real_escape_string($connect, $_POST['hotel']);
    $hotel_stars = $_POST['hotel_stars'];
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $departure_date =  date('Y-m-d', strtotime($_POST["departure_date"]));
    $date_back = date('Y-m-d', strtotime($_POST["date_back"]));
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $_SESSION['errors'] = array();

    $isValidInputs = (!empty($destination) and !empty($hotel) and !empty($hotel_stars) and !empty($price) and !empty($departure_date) and !empty($date_back) and !empty($image));


    if (!$isValidInputs) {
      $_SESSION['errors'][] = "Todos os campos são obrigatórios.";
    }

    if (empty($_SESSION['errors'])) {
      $query = "INSERT
        INTO packages (destination, hotel, hotel_stars, price, departure_date, date_back, image)
        VALUES ('$destination', '$hotel', '$hotel_stars', '$price', '$departure_date', '$date_back', '$image')";

      $execute = mysqli_query($connect, $query);

      if ($execute) {
        $lastPackageId =  mysqli_insert_id($connect);

        uploadImage($lastPackageId, $image_tmp_name, $image);

        return $lastPackageId;
      }
    }
  }
}
