<?php
if (isset($_SESSION["project_menu"]["users"])) {
  header("Location: ../views/");
  exit;
}
