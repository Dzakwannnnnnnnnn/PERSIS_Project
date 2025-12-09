<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Izin - PERSIS</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;

      /* 🔥 memberikan jarak agar konten tidak nempel navbar */
      padding-top: 120px;
    }

    header {
      background-color: #f8f9fa;
      padding: 1rem 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 0;
      padding: 0 2rem;
    }

    .logo img {
      height: 50px;
    }

    .nav-main {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .nav-main a {
      text-decoration: none;
      color: #007bff;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: all 0.3s;
      font-weight: 500;
    }

    .nav-main a:hover {
      background-color: #007bff;
      color: white;
    }

    .nav-user {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .nav-user a {
      text-decoration: none;
      background-color: #007bff;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background-color 0.3s;
      font-size: 0.9rem;
    }

    .nav-user a:hover {
      background-color: #0056b3;
    }

    .user-info {
      color: #007bff;
      font-weight: bold;
      font-size: 0.9rem;
      padding: 0.5rem;
    }

    .logo a {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }

    .logo h1 {
      margin: 0;
      color: #007bff;
      font-size: 1.2rem;
      white-space: nowrap;
    }

    .user-menu {
      position: relative;
      display: inline-block;
    }

    .user-dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 100%;
      background: white;
      min-width: 180px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      z-index: 1001;
      margin-top: 5px;
    }

    .user-dropdown a {
      display: block;
      padding: 0.75rem 1rem;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #f0f0f0;
      background: white;
      border-radius: 0;
      text-align: left;
    }

    .user-dropdown a:hover {
      background-color: #f8f9fa;
      color: #007bff;
    }

    .user-menu:hover .user-dropdown {
      display: block;
    }

    .user-toggle {
      background: #007bff;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .user-toggle:hover {
      background: #0056b3;
    }

    /* 🔥 container turun lebih ke bawah agar tidak nempel nav */
    .container {
      max-width: 800px;
      margin: 60px auto 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      text-align: center;
      margin-bottom: 2rem;
    }

    .welcome-message {
      text-align: center;
      margin-bottom: 2rem;
      color: #666;
    }

    .dashboard {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 2rem;
    }

    .dashboard-grid {
      display: flex;
      gap: 2rem;
      justify-content: center;
      align-items: stretch;
      flex-wrap: wrap;
    }

    .dashboard-box {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
      flex: 1;
      min-width: 300px;
    }

    .dashboard-box h3 {
      margin-bottom: 1rem;
      color: #333;
    }

    .dashboard-box p {
      margin-bottom: 1.5rem;
      color: #666;
    }

    .dashboard-btn {
      display: inline-block;
      padding: 1rem 2rem;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .dashboard-btn:hover {
      background-color: #0056b3;
    }

    .izin-form {
      display: grid;
      gap: 1rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    /* Responsive */
    @media (max-width: 768px) {
      nav ul {
        flex-direction: column;
        gap: 1rem;
        padding: 0 1rem;
      }

      .nav-main,
      .nav-user {
        flex-wrap: wrap;
        justify-content: center;
      }

      .logo h1 {
        font-size: 1rem;
      }

      .container {
        margin: 1rem;
        padding: 1rem;
      }

      .izin-form {
        gap: 1rem;
      }

      .form-group {
        flex-direction: column;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
    }

    label {
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
      padding: 0.75rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .btn-submit {
      background-color: #28a745;
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 1rem;
    }

    .btn-submit:hover {
      background-color: #218838;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 3rem 0 2rem;
      text-align: center;
      margin-top: 4rem;
      position: relative;
      clear: both;
    }

    footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #007bff, #0056b3);
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .footer-content p {
      margin: 0;
      font-size: 0.9rem;
      opacity: 0.9;
      font-weight: 300;
    }
  </style>
</head>

<body>

  <header>
    <nav>
      <ul>
        <div class="logo">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/">
            <img src="Public/Uploads/LogoSMKTI.png" alt="Logo SMK TI Airlangga">
            <h1>PERSIS | Perizinan Siswa</h1>
          </a>
        </div>

        <div class="nav-main">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/">Home</a>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/#tentang">Tentang</a>
        </div>

        <div class="nav-user">
          <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-menu">
              <button class="user-toggle">
                👤 <?php echo htmlspecialchars(isset($_SESSION['username']) ? $_SESSION['username'] : 'User'); ?> ▼
              </button>

              <div class="user-dropdown">
                <?php if ($_SESSION['role'] === 'siswa'): ?>
                  <a href="/Muhammad_Dzakwan_Perizinan_Siswa/izin">Ajukan Izin</a>
                  <a href="/Muhammad_Dzakwan_Perizinan_Siswa/status">Status Perizinan</a>
                <?php endif; ?>
                <a href="/Muhammad_Dzakwan_Perizinan_Siswa/logout">Logout</a>
              </div>
            </div>
          <?php else: ?>
            <a href="/Muhammad_Dzakwan_Perizinan_Siswa/login">Login</a>
          <?php endif; ?>
        </div>
      </ul>
    </nav>
  </header>

  <?php if ($_SESSION['role'] == 'siswa'): ?>
    <?php if (isset($_GET['form'])): ?>
      <div class="container">
        <h1>Ajukan Perizinan Mu</h1>
        <div class="welcome-message">
          Silakan lengkapi formulir di bawah ini untuk mengajukan permohonan izin.
        </div>

        <?php if (isset($_GET['success'])): ?>
          <div class="alert alert-success"
            style="background-color: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
            <strong>Berhasil!</strong> Permohonan izin Anda telah berhasil dikirim dan sedang menunggu persetujuan dari guru.
          </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-danger"
            style="background-color: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
            <strong>Error!</strong>
            <?php
            switch ($_GET['error']) {
              case 'empty':
                echo 'Semua field harus diisi.';
                break;
              case 'file_type':
                echo 'Tipe file tidak didukung. Hanya PDF, JPG, JPEG, dan PNG yang diperbolehkan.';
                break;
              case 'file_size':
                echo 'Ukuran file terlalu besar. Maksimal 5MB.';
                break;
              case 'upload':
                echo 'Gagal mengupload file.';
                break;
              default:
                echo 'Terjadi kesalahan. Silakan coba lagi.';
            }
            ?>
          </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
          <div
            style="color:#155724;background:#d4edda;border:1px solid #c3e6cb;padding:0.75rem;border-radius:4px;margin-bottom:1rem;">
            Permohonan izin berhasil diajukan! <br>
            <a href="/Muhammad_Dzakwan_Perizinan_Siswa/status" style="color:#155724;text-decoration:underline;">Lihat Status
              Perizinan</a>
          </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
          <div
            style="color:#721c24;background:#f8d7da;border:1px solid #f5c6cb;padding:0.75rem;border-radius:4px;margin-bottom:1rem;">
            <?php
            if ($_GET['error'] == 'empty') {
              echo "Harap isi semua field!";
            } elseif ($_GET['error'] == 'file_type') {
              echo "Format file tidak didukung. Hanya PDF, JPG, PNG yang diperbolehkan.";
            } elseif ($_GET['error'] == 'file_size') {
              echo "Ukuran file terlalu besar. Maksimal 5MB.";
            } elseif ($_GET['error'] == 'upload') {
              echo "Gagal mengupload file. Silakan coba lagi.";
            } else {
              echo "Terjadi kesalahan. Silakan coba lagi.";
            }
            ?>
          </div>
        <?php endif; ?>

        <form class="izin-form" action="/Muhammad_Dzakwan_Perizinan_Siswa/izin" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="jenis_izin">Jenis Izin:</label>
            <select id="jenis_izin" name="jenis_izin" required>
              <option value="">Pilih jenis izin</option>
              <option value="sakit">Izin Sakit</option>
              <option value="keluarga">Izin Keluarga</option>
              <option value="acara">Izin Acara</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>

          <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
          </div>

          <div class="form-group">
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
          </div>

          <div class="form-group">
            <label for="alasan">Alasan:</label>
            <textarea id="alasan" name="alasan" placeholder="Jelaskan alasan permohonan izin..." required></textarea>
          </div>

          <div class="form-group">
            <label for="bukti">Bukti (Opsional - PDF, JPG, PNG, max 5MB):</label>
            <input type="file" id="bukti" name="bukti" accept=".pdf,.jpg,.jpeg,.png">
          </div>

          <button type="submit" class="btn-submit">Ajukan Perizinan</button>
        </form>
      </div>
    <?php else: ?>
      <div class="dashboard">
        <h1>Ajukan permohonan izin</h1>
        <div class="dashboard-grid">
          <div class="dashboard-box">
            <h3>Ajukan Izin</h3>
            <p>Klik tombol di bawah untuk mengajukan permohonan izin baru.</p>
            <a href="?form=1" class="dashboard-btn">Akses Form</a>
          </div>
          <div class="dashboard-box">
            <h3>Lihat Status Izin</h3>
            <p>Klik tombol di bawah untuk melihat status permohonan izin Anda.</p>
            <a href="/Muhammad_Dzakwan_Perizinan_Siswa/status" class="dashboard-btn">Lihat Status</a>
          </div>
        </div>
      </div>
    <?php endif; ?>

  <?php else: ?>
    <div class="dashboard">
      <div class="dashboard-box">
        <h3>Hai, Guru!</h3>
        <p>Anda dapat mengelola perizinan siswa dari halaman admin.</p>
        <a href="/Muhammad_Dzakwan_Perizinan_Siswa/" class="dashboard-btn">Kembali ke Home</a>
      </div>
    </div>
  <?php endif; ?>

  <footer>
    <div class="footer-content">
      <p>&copy; 2024 PERSIS - Sistem Perizinan Siswa SMK TI Airlangga. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>