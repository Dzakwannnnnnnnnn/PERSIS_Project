<?php
require_once 'Config/koneksi.php';

// Siswa credentials
$siswa_username = 'siswa1';
$siswa_email = 'siswa1@smkti.com';
$siswa_password = 'siswa123';
$siswa_role = 'siswa';
$siswa_verified = 1;

// Guru credentials
$guru_username = 'guru1';
$guru_email = 'guru1@smkti.com';
$guru_password = 'guru123';
$guru_role = 'guru';
$guru_verified = 1;

// Hash passwords
$hashed_siswa_password = password_hash($siswa_password, PASSWORD_DEFAULT);
$hashed_guru_password = password_hash($guru_password, PASSWORD_DEFAULT);

// Insert siswa
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role, verified) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE verified = VALUES(verified)");
$stmt->bind_param("ssssi", $siswa_username, $siswa_email, $hashed_siswa_password, $siswa_role, $siswa_verified);
if ($stmt->execute()) {
  echo "Siswa account created/updated successfully!\n";
  echo "Username: siswa1\n";
  echo "Password: siswa123\n";
} else {
  echo "Error creating siswa account: " . $stmt->error . "\n";
}

// Insert guru
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role, verified) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE verified = VALUES(verified)");
$stmt->bind_param("ssssi", $guru_username, $guru_email, $hashed_guru_password, $guru_role, $guru_verified);
if ($stmt->execute()) {
  echo "Guru account created/updated successfully!\n";
  echo "Username: guru1\n";
  echo "Password: guru123\n";
} else {
  echo "Error creating guru account: " . $stmt->error . "\n";
}

$stmt->close();
mysqli_close($conn);
?>