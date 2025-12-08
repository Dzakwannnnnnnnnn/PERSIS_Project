<?php
// Redirect guru to their dashboard
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'guru') {
  header('Location: /Muhammad_Dzakwan_Perizinan_Siswa/guru');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERSIS | Perizinan Siswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
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

    /* Dropdown untuk menu user */
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

    .hero {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #5a4fcf 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
      margin-top: 80px;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,1000 1000,0 1000,1000"/></svg>');
    }

    .hero-content {
      max-width: 800px;
      padding: 2rem;
      position: relative;
      z-index: 2;
    }

    .hero h2 {
      font-size: 4rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
      background: linear-gradient(45deg, #fff, #e3f2fd);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero p {
      font-size: 1.4rem;
      margin-bottom: 2.5rem;
      opacity: 0.9;
      font-weight: 300;
      line-height: 1.6;
    }

    .cta-buttons {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .cta-button {
      padding: 1rem 2.5rem;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      border: 2px solid transparent;
    }

    .cta-primary {
      background: linear-gradient(135deg, #00b4db, #0083b0);
      color: white;
    }

    .cta-secondary {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .cta-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
    }

    /* Features Section */
    .features {
      padding: 5rem 2rem;
      background: rgba(255, 255, 255, 0.95);
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .feature-card {
      background: white;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    /* Animations */
    @keyframes float {

      0%,
      100% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    .hero h2 {
      animation: float 3s ease-in-out infinite;
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
        cursor: pointer;
        font-size: 1rem;
      }

      .hero {
        margin-top: 140px;
        padding: 1rem;
      }

      .hero h2 {
        font-size: 2.5rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }

      .features-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .about-container {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .about-content h2 {
        font-size: 2.2rem;
      }

      .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
    }

    .about {
      padding: 100px 2rem;
      background: white;
      position: relative;
    }

    .about-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: center;
    }

    .about-content h2 {
      font-size: 3rem;
      color: #2c3e50;
      margin-bottom: 1.5rem;
      font-weight: 700;
    }

    .about-content h2 span {
      color: #007bff;
    }

    .about-content p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #5a6c7d;
      margin-bottom: 2rem;
    }

    .about-features {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .feature-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      background: #f8f9fa;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .feature-item:hover {
      transform: translateX(10px);
      background: #e3f2fd;
    }

    .feature-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #007bff, #0056b3);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
    }

    .feature-text h4 {
      color: #2c3e50;
      margin-bottom: 0.3rem;
    }

    .feature-text p {
      color: #7f8c8d;
      margin: 0;
      font-size: 0.9rem;
    }

    .about-image {
      position: relative;
    }

    .about-image::before {
      content: '';
      position: absolute;
      top: -20px;
      left: -20px;
      right: 20px;
      bottom: 20px;
      background: linear-gradient(135deg, #007bff, #0056b3);
      border-radius: 20px;
      z-index: 1;
    }

    .about-image img {
      position: relative;
      width: 100%;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      z-index: 2;
    }

    /* Stats Section */
    .stats {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 80px 2rem;
      color: white;
      text-align: center;
    }

    .stats-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 3rem;
    }

    .stat-item h3 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 0.5rem;
    }

    .stat-item p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    /* Responsive untuk about section */
    @media (max-width: 768px) {
      .about-container {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .about-content h2 {
        font-size: 2.2rem;
      }
    }

    footer {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 20px;
      color: white;
      text-align: center;
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

  <section class="hero">
    <div class="hero-content">
      <h2>PERSIS</h2>
      <p>Sistem Perizinan Siswa Modern SMK TI Airlangga<br>Kelola perizinan dengan mudah, cepat, dan efisien</p>
      <div class="cta-buttons">
        <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'siswa'): ?>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/izin" class="cta-button cta-primary">Ajukan Permohonan Izin</a>
        <?php else: ?>
          <a href="/Muhammad_Dzakwan_Perizinan_Siswa/login" class="cta-button cta-primary">Login untuk Mengajukan Izin</a>
        <?php endif; ?>
        <a href="#tentang" class="cta-button cta-secondary">Pelajari Lebih Lanjut</a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <div class="features-grid">
      <div class="feature-card">
        <h3>🚀 Cepat</h3>
        <p>Proses pengajuan izin hanya dalam hitungan menit</p>
      </div>
      <div class="feature-card">
        <h3>📱 Mudah</h3>
        <p>Antarmuka yang user-friendly dan intuitif</p>
      </div>
      <div class="feature-card">
        <h3>🔒 Aman</h3>
        <p>Data tersimpan dengan sistem keamanan terbaik</p>
      </div>
      <div class="feature-card">
        <h3>📊 Real-time</h3>
        <p>Pantau status perizinan secara real-time</p>
      </div>
    </div>
  </section>

  <section id="tentang" class="about">
    <div class="about-container">
      <div class="about-content">
        <h2>Tentang <span>PERSIS</span></h2>
        <p>
          PERSIS (Perizinan Siswa) adalah sistem digital inovatif yang dirancang khusus untuk SMK TI Airlangga
          guna mempermudah proses pengajuan dan pengelolaan perizinan siswa. Dengan teknologi terkini,
          kami menghadirkan solusi yang efisien, transparan, dan terintegrasi.
        </p>

        <div class="about-features">
          <div class="feature-item">
            <div class="feature-icon">🚀</div>
            <div class="feature-text">
              <h4>Proses Cepat</h4>
              <p>Pengajuan izin diproses dalam hitungan menit</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-icon">📱</div>
            <div class="feature-text">
              <h4>Akses Mudah</h4>
              <p>Dapat diakses kapan saja dan di mana saja</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-icon">🔒</div>
            <div class="feature-text">
              <h4>Data Aman</h4>
              <p>Keamanan data siswa terjamin dengan sistem terenkripsi</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-icon">📊</div>
            <div class="feature-text">
              <h4>Laporan Real-time</h4>
              <p>Pantau status perizinan secara langsung dan transparan</p>
            </div>
          </div>
        </div>
      </div>

      <div class="about-image">
        <img src="Public/Uploads/LogoSMKTI.png" alt="Logo SMK TI Airlangga"
          style="width:100%; height:400px; object-fit:contain; border-radius:20px;">
      </div>
    </div>
  </section>

  <?php
  // Include database connection
  require_once __DIR__ . '/../../../Config/koneksi.php';

  // Query to count registered students with role 'siswa' and verified
  $siswa_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM users WHERE role = 'siswa' AND verified = 1");
  $siswa_count = mysqli_fetch_assoc($siswa_query)['count'];

  // Query to count pending izin applications
  $izin_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM izin WHERE status = 'pending'");
  $izin_count = mysqli_fetch_assoc($izin_query)['count'];
  ?>

  <section class="stats">
    <div class="stats-grid">
      <div class="stat-item">
        <h3><?php echo $siswa_count; ?></h3>
        <p>Siswa Terdaftar</p>
      </div>
      <div class="stat-item">
        <h3><?php echo $izin_count; ?></h3>
        <p>Izin Diproses</p>
      </div>
    </div>
  </section>
  <footer>
    <div class="footer-content">
      <p>&copy; 2024 PERSIS - Sistem Perizinan Siswa SMK TI Airlangga. All rights reserved.</p>
    </div>
  </footer>
</body>


</html>