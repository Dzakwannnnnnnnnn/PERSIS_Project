<?php
require_once 'BaseController.php';

class AuthController extends BaseController
{
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->handleLogin();
    } else {
      $this->showLoginForm();
    }
  }

  private function handleLogin()
  {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/login?error=empty');
    }

    $stmt = $this->conn->prepare("SELECT id, username, password, role, verified FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
        if ($user['verified'] == 0) {
          $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/login?error=unverified');
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        switch ($user['role']) {
          case 'admin':
            $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
            break;
          case 'guru':
            $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
            break;
          case 'siswa':
          default:
            $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/');
            break;
        }
      }
    }

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/login?error=invalid');
  }

  private function showLoginForm()
  {
    include 'App/Views/Auth/Login.php';
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->handleRegister();
    } else {
      $this->showRegisterForm();
    }
  }

  private function handleRegister()
  {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/register?error=empty');
    }

    if ($password !== $confirm_password) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/register?error=password_mismatch');
    }

    // Check if username already exists
    $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/register?error=exists');
    }

    // Insert new user
    $role = trim($_POST['role'] ?? 'siswa');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("INSERT INTO users (username, email, role, password, verified) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $username, $email, $role, $hashed_password);

    if ($stmt->execute()) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/register?success=1');
    } else {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/register?error=general');
    }
  }

  private function showRegisterForm()
  {
    include 'App/Views/Auth/Register.php';
  }

  public function logout()
  {
    session_destroy();
    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/');
  }
}
?>