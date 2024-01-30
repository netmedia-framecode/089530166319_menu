<?php
function valid($conn, $value)
{
  $valid = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $value))));
  return $valid;
}

function separateAlphaNumeric($string)
{
  $alpha = "";
  $numeric = "";
  // Mengiterasi setiap karakter dalam string
  for ($i = 0; $i < strlen($string); $i++) {
    // Memeriksa apakah karakter adalah huruf
    if (ctype_alpha($string[$i])) {
      $alpha .= $string[$i];
    }
    // Memeriksa apakah karakter adalah angka
    if (ctype_digit($string[$i])) {
      $numeric .= $string[$i];
    }
  }
  // Mengembalikan array yang berisi huruf dan angka terpisah
  return array(
    "alpha" => $alpha,
    "numeric" => $numeric
  );
}

function compressImage($source, $destination, $quality)
{
  // mendapatkan info image
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];
  // membuat image baru
  switch ($mime) {
      // proses kode memilih tipe tipe image 
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      break;
    default:
      $image = imagecreatefromjpeg($source);
  }

  // Menyimpan image dengan ukuran yang baru
  imagejpeg($image, $destination, $quality);

  // Return image
  return $destination;
}

if (!isset($_SESSION["project_menu"]["users"])) {

  function login($conn, $data)
  {
    // check account
    $email_primary = "admin@gmail.com";
    if ($data['email'] != $email_primary) {
      $message = "Maaf, akun yang anda masukan tidak terdaftar.";
      $message_type = "danger";
      alert($message, $message_type);
      return false;
    } else {
      if (password_verify($data['password'], "$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG")) {
        $_SESSION["project_menu"]["users"] = [
          "email" => $email_primary,
          "name" => "Admin",
        ];
        return mysqli_affected_rows($conn);
      } else {
        $message = "Maaf, kata sandi yang anda masukan salah.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    }
  }
}

if (isset($_SESSION["project_menu"]["users"])) {

  function menu($conn, $data, $action)
  {
    $path = "../assets/img/menu/";

    if ($action == "insert") {
      $fileName = basename($_FILES["image"]["name"]);
      $fileName = str_replace(" ", "-", $fileName);
      $fileName_encrypt = crc32($fileName);
      $ekstensiGambar = explode('.', $fileName);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        $imageTemp = $_FILES["image"]["tmp_name"];
        compressImage($imageTemp, $imageUploadPath, 75);
        $image = $fileName_encrypt . "." . $ekstensiGambar;
      } else {
        $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
      $sql = "INSERT INTO menu(id_kategori,image,judul,deskripsi,harga) VALUES('$data[id_kategori]','$image','$data[judul]','$data[deskripsi]','$data[harga]')";
    }

    if ($action == "update") {
      if (!empty($_FILES['image']["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileName = str_replace(" ", "-", $fileName);
        $fileName_encrypt = crc32($fileName);
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
          $imageTemp = $_FILES["image"]["tmp_name"];
          compressImage($imageTemp, $imageUploadPath, 75);
          $image = $fileName_encrypt . "." . $ekstensiGambar;
          unlink($path . $data['imageOld']);
        } else {
          $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      } else if (empty($_FILE['image']["name"])) {
        $image = $data['imageOld'];
      }
      $sql = "UPDATE menu SET image='$image', judul='$data[judul]', deskripsi='$data[deskripsi]', harga='$data[harga]' WHERE id_menu='$data[id_menu]'";
    }

    if ($action == "delete") {
      unlink($path . $data['image']);
      $sql = "DELETE FROM menu WHERE id_menu='$data[id_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function __name($conn, $data, $action)
  {
    if ($action == "insert") {
    }

    if ($action == "update") {
    }

    if ($action == "delete") {
    }

    // mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }
}
