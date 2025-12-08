<?php
class BaseController
{
  protected $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  protected function redirect($url)
  {
    header("Location: $url");
    exit;
  }

  protected function isLoggedIn()
  {
    return isset($_SESSION['user_id']);
  }

  protected function getUserRole()
  {
    return $_SESSION['role'] ?? null;
  }

  protected function requireLogin()
  {
    if (!$this->isLoggedIn()) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/login');
    }
  }

  protected function requireRole($role)
  {
    $this->requireLogin();
    if ($this->getUserRole() !== $role) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/');
    }
  }
}
?>