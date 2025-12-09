<?php
require_once 'BaseController.php';
require_once __DIR__ . '/../Models/NotificationModel.php';
require_once __DIR__ . '/../Models/IzinModel.php';

class GuruController extends BaseController
{
  private $notificationModel;
  private $izinModel;

  public function __construct($conn)
  {
    parent::__construct($conn);
    $this->notificationModel = new NotificationModel($conn);
    $this->izinModel = new IzinModel($conn);
  }

  public function dashboard()
  {
    $this->requireRole('guru');
    include 'App/Views/Guru/dashboard.php';
  }

  public function approveIzin($izin_id)
  {
    $this->requireRole('guru');

    // Update izin status
    $this->izinModel->updateIzinStatus($izin_id, 'approved');

    // Get izin details for notification
    $izin = $this->izinModel->getIzinById($izin_id);
    if ($izin) {
      $message = "Permohonan izin Anda untuk " . ucfirst($izin['jenis_izin']) . " telah DISETUJUI.";
      $this->notificationModel->createNotification($izin['user_id'], $izin_id, $message);
    }

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
  }

  public function rejectIzin($izin_id)
  {
    $this->requireRole('guru');

    // Update izin status
    $this->izinModel->updateIzinStatus($izin_id, 'rejected');

    // Get izin details for notification
    $izin = $this->izinModel->getIzinById($izin_id);
    if ($izin) {
      $message = "Permohonan izin Anda untuk " . ucfirst($izin['jenis_izin']) . " telah DITOLAK.";
      $this->notificationModel->createNotification($izin['user_id'], $izin_id, $message);
    }

    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
  }

  public function viewIzin($izin_id)
  {
    $this->requireRole('guru');
    $izin = $this->izinModel->getIzinById($izin_id);
    if (!$izin) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
    }
    $current_izin = $izin;
    include 'App/Views/Guru/view_izin.php';
  }

  public function editIzin($izin_id)
  {
    $this->requireRole('guru');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $jenis_izin = $_POST['jenis_izin'];
      $tanggal_mulai = $_POST['tanggal_mulai'];
      $tanggal_selesai = $_POST['tanggal_selesai'];
      $alasan = $_POST['alasan'];
      $bukti = $_POST['bukti'];

      $this->izinModel->updateIzin($izin_id, $jenis_izin, $tanggal_mulai, $tanggal_selesai, $alasan, $bukti);
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
    }

    $izin = $this->izinModel->getIzinById($izin_id);
    if (!$izin) {
      $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
    }
    $current_izin = $izin;
    include 'App/Views/Guru/edit_izin.php';
  }

  public function deleteIzin($izin_id)
  {
    $this->requireRole('guru');

    $this->izinModel->deleteIzin($izin_id);
    $this->redirect('/Muhammad_Dzakwan_Perizinan_Siswa/guru');
  }
}
?>