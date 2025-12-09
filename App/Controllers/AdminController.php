<?php
require_once 'BaseController.php';

class AdminController extends BaseController
{
  public function dashboard()
  {
    $this->requireRole('admin');
    include 'App/Views/Admin/dashboard.php';
  }

  public function verifyUser($user_id)
  {
    $this->requireRole('admin');

    $stmt = $this->conn->prepare("UPDATE users SET verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
  }

  public function deleteUser($user_id)
  {
    $this->requireRole('admin');

    $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
  }

  public function approveIzin($izin_id)
  {
    $this->requireRole('admin');

    $stmt = $this->conn->prepare("UPDATE izin SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $izin_id);
    $stmt->execute();

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
  }

  public function rejectIzin($izin_id)
  {
    $this->requireRole('admin');

    $stmt = $this->conn->prepare("UPDATE izin SET status = 'rejected' WHERE id = ?");
    $stmt->bind_param("i", $izin_id);
    $stmt->execute();

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
  }
}
?>