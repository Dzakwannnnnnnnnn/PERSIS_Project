<?php
require_once 'BaseController.php';

class IzinController extends BaseController
{
  public function index()
  {
    $this->requireLogin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->handleIzinSubmission();
    } else {
      $this->showIzinPage();
    }
  }

  private function handleIzinSubmission()
  {
    $this->requireRole('siswa');

    $jenis_izin = trim($_POST['jenis_izin'] ?? '');
    $tanggal_mulai = trim($_POST['tanggal_mulai'] ?? '');
    $tanggal_selesai = trim($_POST['tanggal_selesai'] ?? '');
    $alasan = trim($_POST['alasan'] ?? '');

    if (empty($jenis_izin) || empty($tanggal_mulai) || empty($tanggal_selesai) || empty($alasan)) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?error=empty');
    }

    // Handle file upload
    $bukti_path = null;
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
      $upload_dir = __DIR__ . '/../../Public/Uploads/';
      if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
      }

      $file_name = $_FILES['bukti']['name'];
      $file_tmp = $_FILES['bukti']['tmp_name'];
      $file_size = $_FILES['bukti']['size'];
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

      // Validate file type
      $allowed_exts = ['pdf', 'jpg', 'jpeg', 'png'];
      if (!in_array($file_ext, $allowed_exts)) {
        $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?error=file_type');
      }

      // Validate file size (5MB max)
      if ($file_size > 5 * 1024 * 1024) {
        $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?error=file_size');
      }

      // Generate unique filename
      $unique_name = uniqid('izin_', true) . '.' . $file_ext;
      $file_path = $upload_dir . $unique_name;

      if (move_uploaded_file($file_tmp, $file_path)) {
        $bukti_path = 'Public/Uploads/' . $unique_name;
      } else {
        $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?error=upload');
      }
    }

    $stmt = $this->conn->prepare("
            INSERT INTO izin (user_id, jenis_izin, tanggal_mulai, tanggal_selesai, alasan, bukti, status)
            VALUES (?, ?, ?, ?, ?, ?, 'pending')
        ");

    $stmt->bind_param(
      "isssss",
      $_SESSION['user_id'],
      $jenis_izin,
      $tanggal_mulai,
      $tanggal_selesai,
      $alasan,
      $bukti_path
    );

    if ($stmt->execute()) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?success=1');
    } else {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/izin?error=general');
    }
  }

  private function showIzinPage()
  {
    $this->requireLogin();

    if ($this->getUserRole() === 'siswa') {

      $this->loadIzinView();

    } else {

      switch ($this->getUserRole()) {
        case 'admin':
          $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/admin');
          break;

        case 'guru':
          $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
          break;

        default:
          $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/');
          break;
      }
    }
  }

  // 🔥 METHOD BARU: khusus load view izin.php
  private function loadIzinView()
  {
    $viewPath = __DIR__ . '/../Views/Users/izin.php';

    if (file_exists($viewPath)) {
      include $viewPath;
    } else {
      die("View tidak ditemukan: $viewPath");
    }
  }

  public function status()
  {
    $this->requireLogin();
    $this->requireRole('siswa');

    require_once __DIR__ . '/../Models/IzinModel.php';

    $izinModel = new IzinModel($this->conn);
    $izin = $izinModel->getIzinByUserId($_SESSION['user_id']);

    include __DIR__ . '/../Views/Users/status.php';
  }
}
