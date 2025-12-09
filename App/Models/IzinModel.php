<?php
require_once 'BaseModel.php';

class IzinModel extends BaseModel
{
  public function __construct($conn)
  {
    parent::__construct($conn);
  }

  public function createIzin($user_id, $jenis_izin, $tanggal_mulai, $tanggal_selesai, $alasan, $bukti = null)
  {
    $stmt = $this->conn->prepare("INSERT INTO izin (user_id, jenis_izin, tanggal_mulai, tanggal_selesai, alasan, bukti, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("isssss", $user_id, $jenis_izin, $tanggal_mulai, $tanggal_selesai, $alasan, $bukti);
    return $stmt->execute();
  }

  public function getIzinById($id)
  {
    $stmt = $this->conn->prepare("SELECT i.*, u.username FROM izin i JOIN users u ON i.user_id = u.id WHERE i.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function getIzinByUserId($user_id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM izin WHERE user_id = ? ORDER BY id DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getAllIzin()
  {
    $result = $this->conn->query("SELECT i.*, u.username FROM izin i JOIN users u ON i.user_id = u.id ORDER BY i.id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function updateIzinStatus($id, $status)
  {
    $stmt = $this->conn->prepare("UPDATE izin SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    return $stmt->execute();
  }

  public function getPendingIzinCount()
  {
    $result = $this->conn->query("SELECT COUNT(*) as count FROM izin WHERE status = 'pending'");
    return $result->fetch_assoc()['count'];
  }

  public function getApprovedIzinCount()
  {
    $result = $this->conn->query("SELECT COUNT(*) as count FROM izin WHERE status = 'approved'");
    return $result->fetch_assoc()['count'];
  }

  public function getRejectedIzinCount()
  {
    $result = $this->conn->query("SELECT COUNT(*) as count FROM izin WHERE status = 'rejected'");
    return $result->fetch_assoc()['count'];
  }

  public function updateIzin($id, $jenis_izin, $tanggal_mulai, $tanggal_selesai, $alasan, $bukti)
  {
    $stmt = $this->conn->prepare("UPDATE izin SET jenis_izin = ?, tanggal_mulai = ?, tanggal_selesai = ?, alasan = ?, bukti = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $jenis_izin, $tanggal_mulai, $tanggal_selesai, $alasan, $bukti, $id);
    return $stmt->execute();
  }

  public function deleteIzin($id)
  {
    // First delete related notifications
    $stmt = $this->conn->prepare("DELETE FROM notifications WHERE izin_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Then delete the izin
    $stmt = $this->conn->prepare("DELETE FROM izin WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }
}
?>