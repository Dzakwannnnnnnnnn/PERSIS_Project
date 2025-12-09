<?php
require_once 'Config/koneksi.php';

// Admin credentials
$username = 'admin';
$email = 'admin@smkti.com';
$password = 'admin123';
$role = 'admin';
$verified = 1;

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert admin user
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role, verified) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $username, $email, $hashed_password, $role, $verified);

if ($stmt->execute()) {
  echo "Admin account created successfully!\n";
  echo "Username: admin\n";
  echo "Password: admin123\n";
  echo "Email: admin@smkti.com\n";
} else {
  echo "Error creating admin account: " . $stmt->error . "\n";
}

$stmt->close();
mysqli_close($conn);
?>