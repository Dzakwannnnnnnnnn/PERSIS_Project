<?php
// Start session for authentication
session_start();

// Include database connection
require_once 'Config/koneksi.php';

// Get the route from URL parameter (set by .htaccess) or REQUEST_URI
$route = isset($_GET['route']) ? $_GET['route'] : '';
if (empty($route)) {
  // Fallback for direct access
  $request_uri = $_SERVER['REQUEST_URI'];
  $path = parse_url($request_uri, PHP_URL_PATH);
  // Remove project folder from path
  $route = str_replace('/Muhammad_Dzakwan_Perizinan_Siswa/', '', $path);
  $route = trim($route, '/');
}

// Basic routing logic
if ($route === '' || $route === '/') {
  // Home page route
  include 'App/Views/Users/beranda.php';
} elseif ($route === 'login') {
  // Handle login POST request
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($username) || empty($password)) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login?error=empty');
      exit;
    }

    // Check user credentials
    $stmt = $conn->prepare("SELECT id, username, password, role, verified FROM users WHERE username = ?");
    if (!$stmt) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login?error=database');
      exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
        if ($user['verified'] == 0) {
          header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login?error=unverified');
          exit;
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'admin') {
          header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/admin');
        } elseif ($user['role'] === 'guru') {
          header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/guru');
        } elseif ($user['role'] === 'siswa') {
          header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/izin');
        } else {
          header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/');
        }
        exit;
      }
    }

    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login?error=invalid');
    exit;
  }
  // Login page
  include 'App/Views/Auth/Login.php';
} elseif ($route === 'register') {
  // Handle register POST request
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=empty');
      exit;
    }

    if ($password !== $confirm_password) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=password_mismatch');
      exit;
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    if (!$stmt) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=database');
      exit;
    }

    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=exists');
      exit;
    }

    // Insert new user
    $role = isset($_POST['role']) ? trim($_POST['role']) : 'siswa';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, role, password, verified) VALUES (?, ?, ?, ?, 0)");
    if (!$stmt) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=database');
      exit;
    }

    $stmt->bind_param("ssss", $username, $email, $role, $hashed_password);

    if ($stmt->execute()) {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?success=1');
      exit;
    } else {
      header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/register?error=general');
      exit;
    }
  }
  // Register page
  include 'App/Views/Auth/Register.php';
} elseif ($route === 'logout') {
  // Logout
  session_destroy();
  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/');
  exit;
} elseif ($route === 'izin') {
  // Izin page (for logged-in users)
  require_once 'App/Controllers/IzinController.php';
  $izinController = new IzinController($conn);
  $izinController->index();
} elseif ($route === 'admin') {
  // Admin dashboard (only for admin users)
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }
  include 'App/Views/Admin/dashboard.php';
} elseif (preg_match('/^admin\/verify\/(\d+)$/', $route, $matches)) {
  // Handle user verification
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  $user_id = $matches[1];
  $stmt = $conn->prepare("UPDATE users SET verified = 1 WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/admin');
  exit;
} elseif (preg_match('/^admin\/delete\/(\d+)$/', $route, $matches)) {
  // Handle user deletion
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  $user_id = $matches[1];
  $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/admin');
  exit;
} elseif (preg_match('/^admin\/approve\/(\d+)$/', $route, $matches)) {
  // Handle izin approval
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  $izin_id = $matches[1];
  $stmt = $conn->prepare("UPDATE izin SET status = 'approved' WHERE id = ?");
  $stmt->bind_param("i", $izin_id);
  $stmt->execute();

  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/admin');
  exit;
} elseif (preg_match('/^admin\/reject\/(\d+)$/', $route, $matches)) {
  // Handle izin rejection
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  $izin_id = $matches[1];
  $stmt = $conn->prepare("UPDATE izin SET status = 'rejected' WHERE id = ?");
  $stmt->bind_param("i", $izin_id);
  $stmt->execute();

  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/admin');
  exit;
} elseif ($route === 'guru') {
  // Guru dashboard
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }
  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->dashboard();
} elseif (preg_match('/^guru\/approve\/(\d+)$/', $route, $matches)) {
  // Handle izin approval by guru
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->approveIzin($matches[1]);
} elseif (preg_match('/^guru\/reject\/(\d+)$/', $route, $matches)) {
  // Handle izin rejection by guru
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->rejectIzin($matches[1]);
} elseif (preg_match('/^guru\/view\/(\d+)$/', $route, $matches)) {
  // Handle view izin details by guru
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->viewIzin($matches[1]);
} elseif (preg_match('/^guru\/edit\/(\d+)$/', $route, $matches)) {
  // Handle edit izin by guru
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->editIzin($matches[1]);
} elseif (preg_match('/^guru\/delete\/(\d+)$/', $route, $matches)) {
  // Handle delete izin by guru
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'guru') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }

  include 'App/Controllers/GuruController.php';
  $guruController = new GuruController($conn);
  $guruController->deleteIzin($matches[1]);
} elseif ($route === 'status') {
  // Status perizinan page
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/login');
    exit;
  }
  include 'App/Controllers/IzinController.php';
  $izinController = new IzinController($conn);
  $izinController->status();
} else {
  // Handle other routes or 404
  http_response_code(404);
  include 'App/Views/Errors/404.php';
}
?>