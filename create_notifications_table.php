<?php
require_once 'Config/koneksi.php';

$sql = 'CREATE TABLE IF NOT EXISTS notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  izin_id INT NOT NULL,
  message TEXT NOT NULL,
  status ENUM("unread","read") DEFAULT "unread",
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (izin_id) REFERENCES izin(id)
)';

if (mysqli_query($conn, $sql)) {
  echo 'Notifications table created successfully';
} else {
  echo 'Error creating notifications table: ' . mysqli_error($conn);
}
?>