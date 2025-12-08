<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Izin - PERSIS</title>
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
      max-width: 600px;
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

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    select,
    textarea {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      font-size: 1rem;
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

    .form-actions {
      text-align: center;
      margin-top: 2rem;
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
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru">Dashboard</a>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/logout">Logout</a>
        </div>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Edit Permohonan Izin</h1>

    <?php
    if (isset($current_izin) && $current_izin) {
      ?>

      <form action="/Muhammad_Dzakwan_Perizinan_Siswa/guru/edit/<?php echo $current_izin['id']; ?>" method="POST">
        <div class="form-group">
          <label for="jenis_izin">Jenis Izin:</label>
          <select id="jenis_izin" name="jenis_izin" required>
            <option value="sakit" <?php echo ($current_izin['jenis_izin'] == 'sakit') ? 'selected' : ''; ?>>Sakit</option>
            <option value="izin" <?php echo ($current_izin['jenis_izin'] == 'izin') ? 'selected' : ''; ?>>Izin</option>
            <option value="cuti" <?php echo ($current_izin['jenis_izin'] == 'cuti') ? 'selected' : ''; ?>>Cuti</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tanggal_mulai">Tanggal Mulai:</label>
          <input type="date" id="tanggal_mulai" name="tanggal_mulai"
            value="<?php echo htmlspecialchars($current_izin['tanggal_mulai']); ?>" required>
        </div>

        <div class="form-group">
          <label for="tanggal_selesai">Tanggal Selesai:</label>
          <input type="date" id="tanggal_selesai" name="tanggal_selesai"
            value="<?php echo htmlspecialchars($current_izin['tanggal_selesai']); ?>" required>
        </div>

        <div class="form-group">
          <label for="alasan">Alasan:</label>
          <textarea id="alasan" name="alasan" required><?php echo htmlspecialchars($current_izin['alasan']); ?></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/guru" class="btn btn-secondary">Batal</a>
        </div>
      </form>

      <?php
    } else {
      echo "<p>Izin tidak ditemukan.</p>";
    }
    ?>
  </div>
</body>

</html>