<?php
$conn = mysqli_connect("localhost", "root", "", "6289530166319");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
