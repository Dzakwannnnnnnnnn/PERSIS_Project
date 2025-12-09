<header>
  <nav>
    <ul>
      <div class="logo">
        <img src="Public/Uploads/LogoSMKTI.png" alt="Logo SMK TI Airlangga">
        <h1>PERSIS | Perizinan Siswa</h1>
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