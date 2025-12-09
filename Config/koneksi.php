<?php
$host = 'localhost';
$dbname = 'sql_dzakwan_pplg24_web_id';
$user = 'sql_dzakwan_pplg24_web_id';
$pass = 'password';

try {
  global $conn;
  $conn = mysqli_connect($host, $user, $pass, $dbname);

  if (!$conn) {
    throw new Exception("Koneksi database gagal: " . mysqli_connect_error());
  }

  mysqli_set_charset($conn, "utf8mb4");

} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}