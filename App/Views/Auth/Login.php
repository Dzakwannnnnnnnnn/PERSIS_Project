<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - PERSIS</title>
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


    .login-wrapper {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 80px);
      padding: 2rem 0;
    }

    .login-container {
      margin-top: 50px;
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

      .login-container {
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
    input[type="password"] {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
    }

    .btn {
      width: 100%;
      padding: 0.75rem;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      margin-bottom: 1rem;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .register-link {
      text-align: center;
      margin-top: 1rem;
    }

    .register-link a {
      color: #007bff;
      text-decoration: none;
    }

    .register-link a:hover {
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
                👤 <?php echo htmlspecialchars($_SESSION['username']); ?> ▼
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
  <div class="login-wrapper">
    <div class="login-container">
      <h2>Login ke PERSIS</h2>

      <?php if (isset($_GET['error'])): ?>
        <div class="error">
          <?php
          if ($_GET['error'] == 'invalid') {
            echo "Username atau password salah!";
          } elseif ($_GET['error'] == 'empty') {
            echo "Harap isi semua field!";
          } elseif ($_GET['error'] == 'unverified') {
            echo "Akun belum di verifikasi";
          }
          ?>
        </div>
      <?php endif; ?>

      <form action="/Muhammad_Dzakwan_Perizinan_Siswa/login" method="POST">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn">Login</button>
      </form>

      <div class="register-link">
        <p>Belum punya akun? <a href="/Muhammad_Dzakwan_Perizinan_Siswa/register">Daftar di sini</a></p>
      </div>
    </div>
</body>

</html>