<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Perizinan - PERSIS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
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
      cursor: pointer;
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

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

      .table {
        font-size: 0.8rem;
        overflow-x: auto;
        display: block;
        white-space: nowrap;
      }

      .table th,
      .table td {
        padding: 0.5rem;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
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

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1rem;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .table th {
      background-color: #f8f9fa;
      font-weight: bold;
    }

    .status-pending {
      color: #ffc107;
      font-weight: bold;
    }

    .status-approved {
      color: #28a745;
      font-weight: bold;
    }

    .status-rejected {
      color: #dc3545;
      font-weight: bold;
    }

    .no-data {
      text-align: center;
      color: #666;
      padding: 2rem;
    }

    .btn-back {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      background-color: #6c757d;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 1rem;
    }

    .btn-back:hover {
      background-color: #5a6268;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 3rem 0 2rem;
      text-align: center;
      margin-top: 4rem;
      position: relative;
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
          <a href="#tentang">Tentang</a>
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

  <div class="container">
    <h1>Status Perizinan</h1>
    <div class="welcome-message">
      Selamat datang, <?php echo htmlspecialchars(isset($_SESSION['username']) ? $_SESSION['username'] : 'User'); ?>!
    </div>

    <?php if (!empty($izin)): ?>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Jenis Izin</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Tanggal Pengajuan</th>
            <th>Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($izin as $row): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['id']); ?></td>
              <td><?php echo htmlspecialchars(ucfirst($row['jenis_izin'])); ?></td>
              <td><?php echo htmlspecialchars($row['tanggal_mulai']); ?></td>
              <td><?php echo htmlspecialchars($row['tanggal_selesai']); ?></td>
              <td>
                <?php echo htmlspecialchars(substr($row['alasan'], 0, 50)) . (strlen($row['alasan']) > 50 ? '...' : ''); ?>
              </td>
              <td class="status-<?php echo htmlspecialchars($row['status']); ?>">
                <?php echo htmlspecialchars(ucfirst($row['status'])); ?>
              </td>
              <td><?php echo htmlspecialchars($row['created_at'] ?? 'N/A'); ?></td>
              <td>
                <?php if (!empty($row['bukti'])): ?>
                  <?php
                  $file_ext = strtolower(pathinfo($row['bukti'], PATHINFO_EXTENSION));
                  if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
                    echo "<img src='/Muhammad_Dzakwan_Perizinan_Siswa/" . htmlspecialchars($row['bukti']) . "' alt='Bukti' style='max-width: 50px; max-height: 50px; border: 1px solid #ddd;'>";
                  } else {
                    echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/" . htmlspecialchars($row['bukti']) . "' target='_blank'>Lihat</a>";
                  }
                  ?>
                <?php else: ?>
                  Tidak ada
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="no-data">
        <p>Anda belum mengajukan permohonan izin.</p>
        <a href="/Muhammad_Dzakwan_Perizinan_Siswa/izin" class="btn-back">Ajukan Izin</a>
      </div>
    <?php endif; ?>

    <div style="text-align: center; margin-top: 2rem;">
      <a href="/Muhammad_Dzakwan_Perizinan_Siswa/izin" class="btn-back">Kembali ke Form Izin</a>
    </div>
  </div>
  <footer>
    <div class="footer-content">
      <p>&copy; 2024 PERSIS - Sistem Perizinan Siswa SMK TI Airlangga. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>