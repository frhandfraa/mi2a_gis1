<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4 rounded-bottom">
  <div class="container-fluid">
    <!-- Brand + Logo + Penjelasan -->
    <a class="navbar-brand d-flex align-items-center fw-bold" href="/peserta/dashboard.php">
      <img src="../assets/img/logo_sumbar.png" alt="Logo Sumbar" height="40" class="me-2">
      <img src="../assets/img/logo_disdik.png" alt="Logo Disdik" height="40" class="me-2">
      <div class="d-flex flex-column">
        <span style="font-size: 16px;">🎓 Portal Peserta</span>
        <small style="font-size: 12px; color: #555;">SPMB SMK Sumatera Barat</small>
      </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/peserta/dashboard.php">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <?php
              $user_name = 'Peserta';
              if (isset($_SESSION['user_id'])) {
                  require_once __DIR__ . "/../../config/database.php";
                  $stmt = $pdo->prepare("SELECT nama_lengkap FROM users WHERE id_user = ?");
                  $stmt->execute([$_SESSION['user_id']]);
                  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
                  if ($user_data) $user_name = $user_data['nama_lengkap'];
              }
              echo htmlspecialchars($user_name);
            ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="/peserta/profil_peserta.php">Profil Saya</a>
            </li>
            <li>
              <a class="dropdown-item text-danger" href="../peserta/logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
