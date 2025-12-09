<?php
require_once 'Config/koneksi.php';

mysqli_query($conn, 'ALTER TABLE users ADD COLUMN role ENUM("siswa", "guru", "admin") DEFAULT "siswa"');
mysqli_query($conn, 'ALTER TABLE users ADD COLUMN verified TINYINT(1) DEFAULT 0');
echo 'Columns added successfully';
mysqli_close($conn);
?>