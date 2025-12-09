<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - PERSIS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    header {
      background-color: #343a40;
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
      display: flex;
      font-size: 12px;
    }

    .logo h1 {
      margin-left: 12px;
      color: white;
    }

    .container {
      max-width: 1200px;
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
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
      border-bottom: 2px solid #007bff;
      padding-bottom: 0.5rem;
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

    .btn-success {
      background-color: #28a745;
      color: white;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .btn:hover {
      opacity: 0.8;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
      border-radius: 8px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: black;
    }

    .logo {
      display: flex;
      font-size: 12px;
    }

    .logo h1 {
      margin-left: 12px;
      color: white;
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
          <h1>PERSIS | Admin Panel</h1>
        </div>
        <div class="nav-buttons">
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/logout">Logout</a>
        </div>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Admin Dashboard</h1>

    <?php
    require_once __DIR__ . '/../../../Config/koneksi.php';

    // Stats
    $total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users"))['count'];
    $verified_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users WHERE verified = 1"))['count'];
    $unverified_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users WHERE verified = 0"))['count'];
    $total_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin"))['count'];
    $pending_izin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin WHERE status = 'pending'"))['count'];
    ?>

    <div class="stats-grid">
      <div class="stat-card">
        <h3><?php echo $total_users; ?></h3>
        <p>Total Users</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $verified_users; ?></h3>
        <p>Verified Users</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $unverified_users; ?></h3>
        <p>Unverified Users</p>
      </div>
      <div class="stat-card">
        <h3><?php echo $total_izin; ?></h3>
        <p>Total Izin</p>
      </div>
    </div>

    <div class="section">
      <h2>User Management</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Verified</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Pagination logic for users
          $limit = 15;
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          $offset = ($page - 1) * $limit;

          // Get total count for pagination
          $total_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users"))['count'];
          $total_pages = ceil($total_count / $limit);

          // Query with limit and offset
          $users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT $limit OFFSET $offset");
          while ($user = mysqli_fetch_assoc($users)) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . htmlspecialchars($user['username'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($user['email'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($user['role'] ?? '') . "</td>";
            echo "<td>" . ($user['verified'] ? 'Yes' : 'No') . "</td>";
            echo "<td>";
            if (!$user['verified']) {
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/admin/verify/" . $user['id'] . "' class='btn btn-success'>Verify</a>";
            }
            echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/admin/delete/" . $user['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
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

    <div class="section">
      <h2>Izin Management</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Jenis Izin</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Pagination logic for izin
          $izin_limit = 15;
          $izin_page = isset($_GET['izin_page']) ? (int) $_GET['izin_page'] : 1;
          $izin_offset = ($izin_page - 1) * $izin_limit;

          // Get total count for izin pagination
          $izin_total_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM izin"))['count'];
          $izin_total_pages = ceil($izin_total_count / $izin_limit);

          // Query with limit and offset for izin
          $izin = mysqli_query($conn, "SELECT i.*, u.username FROM izin i JOIN users u ON i.user_id = u.id ORDER BY i.id DESC LIMIT $izin_limit OFFSET $izin_offset");
          while ($row = mysqli_fetch_assoc($izin)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jenis_izin']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_mulai']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_selesai']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td>";
            if ($row['status'] == 'pending') {
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/admin/approve/" . $row['id'] . "' class='btn btn-success'>Approve</a>";
              echo "<a href='/Muhammad_Dzakwan_Perizinan_Siswa/admin/reject/" . $row['id'] . "' class='btn btn-danger'>Reject</a>";
            }
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Modal functionality can be added here if needed
  </script>
</body>

</html>