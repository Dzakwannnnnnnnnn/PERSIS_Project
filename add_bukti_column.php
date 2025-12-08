<?php
require_once 'Config/koneksi.php';

$query = 'ALTER TABLE izin ADD COLUMN bukti VARCHAR(255) DEFAULT NULL';
if (mysqli_query($conn, $query)) {
  echo 'Column bukti added successfully.';
} else {
  echo 'Error: ' . mysqli_error($conn);
}
?>