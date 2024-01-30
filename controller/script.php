<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("db_connect.php");
require_once(__DIR__ . "/../models/alert.php");
require_once("functions.php");

$messageTypes = ["success", "info", "warning", "danger", "dark"];

$baseURL = "https://$_SERVER[HTTP_HOST]/apps/other/089530166319/menu/";
$name_website = "Toko Online";

$select_menu_makanan = "SELECT * FROM menu WHERE id_kategori='1'";
$views_menu_makanan = mysqli_query($conn, $select_menu_makanan);
$select_menu_minuman = "SELECT * FROM menu WHERE id_kategori='2'";
$views_menu_minuman = mysqli_query($conn, $select_menu_minuman);

if (!isset($_SESSION["project_menu"]["users"])) {
  if (isset($_SESSION["project_menu"]["time_message"]) && (time() - $_SESSION["project_menu"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_menu"]["message_$type"])) {
        unset($_SESSION["project_menu"]["message_$type"]);
      }
    }
    unset($_SESSION["project_menu"]["time_message"]);
  }
  if (isset($_POST["login"])) {
    if (login($conn, $_POST) > 0) {
      header("Location: ../views/");
      exit();
    }
  }
}

if (isset($_SESSION["project_menu"]["users"])) {
  $email = valid($conn, $_SESSION["project_menu"]["users"]["email"]);
  $name = valid($conn, $_SESSION["project_menu"]["users"]["name"]);
  if (isset($_SESSION["project_menu"]["users"]["time_message"]) && (time() - $_SESSION["project_menu"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_menu"]["users"]["message_$type"])) {
        unset($_SESSION["project_menu"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_menu"]["users"]["time_message"]);
  }

  $select_menu_limit = "SELECT * FROM menu ORDER BY id_menu DESC LIMIT 10";
  $views_menu_limit = mysqli_query($conn, $select_menu_limit);
  $select_menu = "SELECT * FROM menu";
  $views_menu = mysqli_query($conn, $select_menu);
  if (isset($_POST["add_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Menu baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: " . $_POST['menu']);
      exit();
    }
  }
  if (isset($_POST["edit_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'update') > 0) {
      $message = "Menu " . $_POST['judulOld'] . " berhasil di ubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: " . $_POST['menu']);
      exit();
    }
  }
  if (isset($_POST["delete_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Menu " . $_POST['judul'] . " berhasil di hapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: " . $_POST['menu']);
      exit();
    }
  }
}
