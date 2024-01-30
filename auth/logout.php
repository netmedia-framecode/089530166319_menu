<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/script.php");
if (isset($_SESSION["project_menu"])) {
  unset($_SESSION["project_menu"]);
  header("Location: ./");
  exit();
}
