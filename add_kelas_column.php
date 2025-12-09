<?php
require_once 'Config/koneksi.php';

$query = 'ALTER TABLE users ADD COLUMN kelas VARCHAR(50) DEFAULT NULL';
if (mysqli_query($conn, $query)) {
  echo 'Column kelas added successfully to users table.';
} else {
  echo 'Error adding column: ' . mysqli_error($conn);
}
?>