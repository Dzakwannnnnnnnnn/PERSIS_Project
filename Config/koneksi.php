<?php
$host = 'localhost';
$dbname = 'perizinan_siswa';
$user = 'root';
$pass = 'Dzakwann033';

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