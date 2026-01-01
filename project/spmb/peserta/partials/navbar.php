<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4 rounded-bottom">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/peserta/dashboard.php">🎓 Portal Peserta</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link" href="/mi2a_gis/project/spmb/peserta/dashboard.php">Beranda</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <?php
              $user_name = 'Peserta';

              if (isset($_SESSION['peserta_id'])) {
                  require_once __DIR__ . "/../../config/database.php";

                  $stmt = $pdo->prepare("SELECT nama_lengkap FROM users WHERE id_user = ?");
                  $stmt->execute([$_SESSION['peserta_id']]);
                  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

                  if ($user_data) {
                      $user_name = $user_data['nama_lengkap'];
                  }
              }

              echo htmlspecialchars($user_name);
            ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="/mi2a_gis/project/spmb/peserta/profil_peserta.php">Profil Saya</a>
            </li>
            <li>
              <a class="dropdown-item text-danger" href="/mi2a_gis/project/spmb/peserta/logout.php">
                Logout
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
