<?php
require_once 'BaseModel.php';

class UserModel extends BaseModel
{
  public function __construct($conn)
  {
    parent::__construct($conn);
  }

  public function getUserById($id)
  {
    $stmt = $this->conn->prepare("SELECT id, username, email, role, verified FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function getUserByUsername($username)
  {
    $stmt = $this->conn->prepare("SELECT id, username, email, password, role, verified FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function getAllUsers()
  {
    $result = $this->conn->query("SELECT id, username, email, role, verified FROM users ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function updateUserRole($id, $role)
  {
    $stmt = $this->conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->bind_param("si", $role, $id);
    return $stmt->execute();
  }

  public function verifyUser($id)
  {
    $stmt = $this->conn->prepare("UPDATE users SET verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

  public function deleteUser($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }
}
?>