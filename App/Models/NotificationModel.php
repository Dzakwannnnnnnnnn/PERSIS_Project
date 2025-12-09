<?php
require_once 'BaseModel.php';

class NotificationModel extends BaseModel
{
  public function __construct($conn)
  {
    parent::__construct($conn);
  }

  public function createNotification($user_id, $izin_id, $message)
  {
    $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, izin_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $izin_id, $message);
    return $stmt->execute();
  }

  public function getNotificationsByUserId($user_id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getUnreadNotificationsCount($user_id)
  {
    $stmt = $this->conn->prepare("SELECT COUNT(*) as count FROM notifications WHERE user_id = ? AND status = 'unread'");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['count'];
  }

  public function markAsRead($id)
  {
    $stmt = $this->conn->prepare("UPDATE notifications SET status = 'read' WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

  public function markAllAsRead($user_id)
  {
    $stmt = $this->conn->prepare("UPDATE notifications SET status = 'read' WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    return $stmt->execute();
  }
}
?>