<?php
require_once 'Config/koneksi.php';

// Create users table with role and verification
$sql = 'CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM("siswa", "guru") DEFAULT "siswa",
  verified TINYINT(1) DEFAULT 0
)';
if (mysqli_query($conn, $sql)) {
  echo 'Users table created successfully<br>';
} else {
  echo 'Error creating users table: ' . mysqli_error($conn) . '<br>';
}

// Create izin table
$sql = 'CREATE TABLE IF NOT EXISTS izin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  jenis_izin VARCHAR(255) NOT NULL,
  tanggal_mulai DATE NOT NULL,
  tanggal_selesai DATE NOT NULL,
  alasan TEXT NOT NULL,
  status ENUM("pending","approved","rejected") DEFAULT "pending",
  FOREIGN KEY (user_id) REFERENCES users(id)
)';
if (mysqli_query($conn, $sql)) {
  echo 'Izin table created successfully<br>';
} else {
  echo 'Error creating izin table: ' . mysqli_error($conn) . '<br>';
}

echo 'Tables created successfully!';
?>