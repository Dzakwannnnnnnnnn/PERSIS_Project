<?php
require_once 'Config/koneksi.php';

$stmt = $conn->prepare("UPDATE users SET role = 'admin' WHERE username = 'admin'");
if ($stmt->execute()) {
  echo "Admin role updated successfully!\n";
} else {
  echo "Error updating admin role: " . $stmt->error . "\n";
}

$stmt->close();
mysqli_close($conn);
?>