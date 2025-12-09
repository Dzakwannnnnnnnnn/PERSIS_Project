<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - PERSIS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
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


    .register-wrapper {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 80px);
      padding: 2rem 0;
    }

    .register-container {
      margin-top: 100px;
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
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

      .register-container {
        margin: 1rem;
        padding: 1rem;
      }

      .user-dropdown {
        right: auto;
        left: 0;
      }
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: #555;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
    }

    .btn {
      width: 100%;
      padding: 0.75rem;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      margin-bottom: 1rem;
    }

    .btn:hover {
      background-color: #218838;
    }

    .login-link {
      text-align: center;
      margin-top: 1rem;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .error {
      color: #dc3545;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      padding: 0.75rem;
      border-radius: 4px;
      margin-bottom: 1rem;
    }

    .success {
      color: #155724;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      padding: 0.75rem;
      border-radius: 4px;
      margin-bottom: 1rem;
    }

    /* Footer */
    footer {
      background-color: #2c3e50;
      color: white;
      padding: 2rem 0;
      text-align: center;
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .footer-content p {
      margin: 0;
      font-size: 0.9rem;
      opacity: 0.8;
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
  <div class="register-wrapper">
    <div class="register-container">
      <h2>Daftar ke PERSIS</h2>

      <?php if (isset($_GET['error'])): ?>
        <div class="error">
          <?php
          if ($_GET['error'] == 'exists') {
            echo "Username atau email sudah digunakan!";
          } elseif ($_GET['error'] == 'empty') {
            echo "Harap isi semua field!";
          } elseif ($_GET['error'] == 'password_mismatch') {
            echo "Password tidak cocok!";
          }
          ?>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['success'])): ?>
        <div class="success">
          Registrasi berhasil! Akun Anda akan diverifikasi oleh admin sebelum dapat digunakan. Silakan tunggu verifikasi.
        </div>
      <?php endif; ?>

      <form action="/Muhammad_Dzakwan_Perizinan_Siswa/register" method="POST">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="role">Role:</label>
          <select id="role" name="role" required>
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
          </select>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
          <label for="confirm_password">Konfirmasi Password:</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn">Daftar</button>
      </form>

      <div class="login-link">
        <p>Sudah punya akun? <a href="/Muhammad_Dzakwan_Perizinan_Siswa/login">Login di sini</a></p>
      </div>
    </div>
</body>

</html>