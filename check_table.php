<?php
require_once 'Config/koneksi.php';

$result = mysqli_query($conn, 'DESCRIBE users');
while ($row = mysqli_fetch_assoc($result)) {
  echo $row['Field'] . ' - ' . $row['Type'] . PHP_EOL;
}
mysqli_close($conn);
?>