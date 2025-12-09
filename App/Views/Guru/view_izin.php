<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Izin - PERSIS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    header {
      background-color: #28a745;
      color: white;
      padding: 1rem 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
      cursor: pointer;
      height: 50px;
    }

    .nav-buttons {
      display: flex;
      gap: 1rem;
    }

    .nav-buttons a {
      text-decoration: none;
      background-color: #007bff;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .nav-buttons a:hover {
      background-color: #0056b3;
    }

    .logo {
      cursor: pointer;
      display: flex;
      font-size: 12px;
    }

    .logo h1 {
      cursor: pointer;
      margin-left: 12px;
      color: white;
    }

    .container {
      max-width: 800px;
      margin: 2rem auto;
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

    .detail-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .detail-item {
      background: #f8f9fa;
      padding: 1rem;
      border-radius: 4px;
    }

    .detail-item strong {
      display: block;
      color: #333;
      margin-bottom: 0.5rem;
    }

    .detail-item span {
      color: #666;
    }

    .status-approved {
      color: #28a745;
      font-weight: bold;
    }

    .status-rejected {
      color: #dc3545;
      font-weight: bold;
    }

    .status-pending {
      color: #ffc107;
      font-weight: bold;
    }

    .btn {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-right: 0.5rem;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
    }

    .btn-secondary {
      background-color: #6c757d;
      color: white;
    }

    .btn:hover {
      opacity: 0.8;
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

      .detail-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <ul>
        <div class="logo">
          <img src="/Muhammad_Dzakwan_Perizinan_Siswa/Public/Uploads/LogoSMKTI.png" alt="Logo SMK TI Airlangga">
          <h1>PERSIS | Guru Panel</h1>
        </div>
        <div class="nav-buttons">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru">Dashboard</a>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/logout">Logout</a>
        </div>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Detail Permohonan Izin</h1>

    <?php
    if (isset($current_izin) && $current_izin) {
      $status_class = 'status-' . $current_izin['status'];
      ?>

      <div class="detail-grid">
        <div class="detail-item">
          <strong>ID Izin:</strong>
          <span><?php echo htmlspecialchars($current_izin['id']); ?></span>
        </div>
        <div class="detail-item">
          <strong>Nama Siswa:</strong>
          <span><?php echo htmlspecialchars($current_izin['username'] ?? 'Tidak diketahui'); ?></span>
        </div>
        <div class="detail-item">
          <strong>Jenis Izin:</strong>
          <span><?php echo htmlspecialchars(ucfirst($current_izin['jenis_izin'])); ?></span>
        </div>
        <div class="detail-item">
          <strong>Tanggal Mulai:</strong>
          <span><?php echo htmlspecialchars($current_izin['tanggal_mulai']); ?></span>
        </div>
        <div class="detail-item">
          <strong>Tanggal Selesai:</strong>
          <span><?php echo htmlspecialchars($current_izin['tanggal_selesai']); ?></span>
        </div>
        <div class="detail-item">
          <strong>Status:</strong>
          <span
            class="<?php echo $status_class; ?>"><?php echo htmlspecialchars(ucfirst($current_izin['status'])); ?></span>
        </div>
      </div>

      <div class="detail-item" style="grid-column: span 2;">
        <strong>Alasan Izin:</strong>
        <span><?php echo nl2br(htmlspecialchars($current_izin['alasan'])); ?></span>
      </div>

      <?php if (!empty($current_izin['bukti'])): ?>
        <div class="detail-item" style="grid-column: span 2;">
          <strong>Bukti:</strong>
          <span>
            <?php
            $file_ext = strtolower(pathinfo($current_izin['bukti'], PATHINFO_EXTENSION));
            if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
              echo "<img src='/Muhammad_Dzakwan_Perizinan_Siswa/" . htmlspecialchars($current_izin['bukti']) . "' alt='Bukti' style='max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;'>";
            } else {
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/" . htmlspecialchars($current_izin['bukti']) . "' target='_blank'>Lihat Bukti (PDF)</a>";
            }
            ?>
          </span>
        </div>
      <?php endif; ?>

      <div class="detail-item" style="grid-column: span 2;">
        <strong>Waktu Permohonan:</strong>
        <span><?php echo htmlspecialchars($current_izin['created_at'] ?? 'Tidak tersedia'); ?></span>
      </div>

      <?php if ($current_izin['status'] == 'pending') { ?>
        <div style="text-align: center; margin-top: 2rem;">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru/approve/<?php echo $current_izin['id']; ?>"
            class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui izin ini?')">Setujui</a>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru/reject/<?php echo $current_izin['id']; ?>" class="btn btn-danger"
            onclick="return confirm('Apakah Anda yakin ingin menolak izin ini?')">Tolak</a>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
      <?php } else { ?>
        <div style="text-align: center; margin-top: 2rem;">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
      <?php } ?>

      <?php
    } else {
      echo "<p>Izin tidak ditemukan.</p>";
    }
    ?>
  </div>
</body>

</html>