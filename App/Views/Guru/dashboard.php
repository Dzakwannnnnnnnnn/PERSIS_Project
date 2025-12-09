<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru Dashboard - PERSIS</title>
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
      max-width: 1400px;
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

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .stat-card {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      color: white;
      padding: 2rem;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-card h3 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }

    .stat-card p {
      opacity: 0.9;
    }

    .section {
      margin-bottom: 3rem;
    }

    .section h2 {
      color: #333;
      margin-bottom: 1rem;
      border-bottom: 2px solid #28a745;
      padding-bottom: 0.5rem;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1rem;
      font-size: 14px;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      text-align: left;
      border-bottom: 1px solid #ddd;
      vertical-align: top;
    }

    .table th {
      background-color: #f8f9fa;
      font-weight: bold;
    }

    .btn {
      padding: 0.4rem 0.8rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      font-size: 12px;
      transition: all 0.3s;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
    }

    .btn-success {
      background-color: #28a745;
      color: white;
    }

    .btn-warning {
      background-color: #ffc107;
      color: #212529;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .btn:hover {
      opacity: 0.8;
      transform: translateY(-1px);
    }

    .status-pending {
      color: #ffc107;
      font-weight: bold;
    }

    .status-approved {
      color: #28a745;
      font-weight: bold;
      background-color: #d4edda;
      padding: 2px 8px;
      border-radius: 12px;
      border: 1px solid #c3e6cb;
      display: inline-block;
    }

    .status-rejected {
      color: #dc3545;
      font-weight: bold;
      background-color: #f8d7da;
      padding: 2px 8px;
      border-radius: 12px;
      border: 1px solid #f5c6cb;
      display: inline-block;
    }

    /* Dropdown Styles */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-toggle {
      background-color: #6c757d;
      color: white;
      padding: 0.4rem 0.8rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 4px;
      right: 0;
    }

    .dropdown-content a {
      color: #333;
      padding: 0.5rem 1rem;
      text-decoration: none;
      display: block;
      border-bottom: 1px solid #f8f9fa;
      font-size: 12px;
    }

    .dropdown-content a:hover {
      background-color: #f8f9fa;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropdown-toggle {
      background-color: #5a6268;
    }

    /* Action buttons container */
    .action-buttons {
      display: flex;
      gap: 0.3rem;
      flex-wrap: wrap;
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

      .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .table {
        font-size: 12px;
        overflow-x: auto;
        display: block;
        white-space: nowrap;
      }

      .table th,
      .table td {
        padding: 0.5rem;
      }

      .btn {
        padding: 0.3rem 0.6rem;
        font-size: 11px;
      }

      .action-buttons {
        flex-direction: column;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 2rem;
    }

    .pagination a,
    .pagination span {
      padding: 0.5rem 1rem;
      margin: 0 0.25rem;
      border: 1px solid #ddd;
      text-decoration: none;
      color: #007bff;
      background-color: white;
      border-radius: 4px;
    }

    .pagination a:hover {
      background-color: #f8f9fa;
    }

    .pagination .current {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <ul>
        <div class="logo">
          <img src="Public/Uploads/LogoSMKTI.png" alt="Logo SMK TI Airlangga">
          <h1>PERSIS | Guru Panel</h1>
        </div>
        <div class="nav-buttons">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/logout">Logout</a>
        </div>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Guru Dashboard</h1>

    <?php
    global $conn;

    // Stats
    $total_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin"))['count'];
    $pending_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin WHERE status = 'pending'"))['count'];
    $approved_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin WHERE status = 'approved'"))['count'];
    $rejected_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin WHERE status = 'rejected'"))['count'];
    ?>

    <div class="stats-grid">
      <div class="stat-card">
        <h3><?php echo $total_izin; ?></h3>
        <p>Total Permohonan Izin</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $pending_izin; ?></h3>
        <p>Menunggu Persetujuan</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $approved_izin; ?></h3>
        <p>Disetujui</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $rejected_izin; ?></h3>
        <p>Ditolak</p>
      </div>
    </div>

    <div class="section">
      <h2>Kelola Permohonan Izin Siswa</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Jenis Izin</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Pagination logic
          $limit = 15;
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          $offset = ($page - 1) * $limit;

          // Get total count for pagination
          $total_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin"))['count'];
          $total_pages = ceil($total_count / $limit);

          // Query with limit and offset
          $izin = mysqli_query($conn, "SELECT i.*, u.username FROM izin i JOIN users u ON i.user_id = u.id ORDER BY i.id DESC LIMIT $limit OFFSET $offset");
          while ($row = mysqli_fetch_assoc($izin)) {
            $status_class = 'status-' . $row['status'];
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jenis_izin']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_mulai']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_selesai']) . "</td>";
            echo "<td>" . htmlspecialchars(substr($row['alasan'], 0, 50)) . "...</td>";
            echo "<td class='$status_class'>" . htmlspecialchars(ucfirst($row['status'])) . "</td>";
            echo "<td>";
            echo "<div class='action-buttons'>";

            // Tombol Lihat (selalu tampil)
            echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/view/" . $row['id'] . "' class='btn btn-primary' title='Lihat Detail'>Lihat</a>";

            if ($row['status'] == 'pending') {
              // Untuk status pending - tombol Setujui dan Tolak
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/approve/" . $row['id'] . "' class='btn btn-success' title='Setujui Izin'>Setujui</a>";
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/reject/" . $row['id'] . "' class='btn btn-danger' title='Tolak Izin'>Tolak</a>";
            } else {
              // Untuk status approved/rejected - tombol Edit
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/edit/" . $row['id'] . "' class='btn btn-warning' title='Edit Izin'>Edit</a>";
            }

            // Dropdown untuk aksi tambahan
            echo "<div class='dropdown'>";
            echo "<button class='dropdown-toggle'>⋮</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/view/" . $row['id'] . "'>Lihat Detail</a>";
            echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/edit/" . $row['id'] . "'>Edit</a>";
            echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/delete/" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus izin ini?\")'>Hapus</a>";
            if ($row['status'] == 'pending') {
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/approve/" . $row['id'] . "'>Setujui</a>";
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/guru/reject/" . $row['id'] . "'>Tolak</a>";
            }
            echo "</div>";
            echo "</div>";

            echo "</div>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>

      <?php if ($total_pages > 1): ?>
        <div class="pagination">
          <?php if ($page > 1): ?>
            <a href="?page=1">&laquo; First</a>
            <a href="?page=<?php echo $page - 1; ?>">&lsaquo; Previous</a>
          <?php endif; ?>

          <?php
          $start = max(1, $page - 2);
          $end = min($total_pages, $page + 2);
          for ($i = $start; $i <= $end; $i++):
            ?>
            <?php if ($i == $page): ?>
              <span class="current"><?php echo $i; ?></span>
            <?php else: ?>
              <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Next &rsaquo;</a>
            <a href="?page=<?php echo $total_pages; ?>">Last &raquo;</a>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // JavaScript untuk konfirmasi aksi
    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('a[href*="delete"]');
      deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          if (!confirm('Apakah Anda yakin ingin menghapus izin ini?')) {
            e.preventDefault();
          }
        });
      });

      const approveButtons = document.querySelectorAll('a[href*="approve"]');
      approveButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          if (!confirm('Apakah Anda yakin ingin menyetujui izin ini?')) {
            e.preventDefault();
          }
        });
      });

      const rejectButtons = document.querySelectorAll('a[href*="reject"]');
      rejectButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          if (!confirm('Apakah Anda yakin ingin menolak izin ini?')) {
            e.preventDefault();
          }
        });
      });
    });
  </script>
</body>

</html>