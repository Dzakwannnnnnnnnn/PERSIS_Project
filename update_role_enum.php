<?php
require_once 'Config/koneksi.php';

mysqli_query($conn, 'ALTER TABLE users MODIFY COLUMN role ENUM("siswa", "guru", "admin") DEFAULT "siswa"');
echo 'Role enum updated successfully';
mysqli_close($conn);
?>