<?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user_id'];

/* Ambil data user */
$stmt = $pdo->prepare("SELECT nama_lengkap, is_verified FROM users WHERE id_user = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) die("Data user tidak ditemukan.");

/* Ambil data jalur final */
$sb = $pdo->prepare("
    SELECT 
        biodata_final,
        afirmasi_locked,
        zonasi_locked,
        prestasi_locked,
        reguler_locked
    FROM peserta_biodata
    WHERE id_user = ?
");
$sb->execute([$id]);
$biodata = $sb->fetch(PDO::FETCH_ASSOC);

$hasBiodata   = (bool) $biodata;
$biodataFinal = ($biodata && (int)$biodata['biodata_final'] === 1);

/* =====================
   CEK JALUR FINAL
===================== */
$jalurList = [
    'Afirmasi' => (int)($biodata['afirmasi_locked'] ?? 0),
    'Zonasi'   => (int)($biodata['zonasi_locked'] ?? 0),
    'Prestasi' => (int)($biodata['prestasi_locked'] ?? 0),
    'Reguler'  => (int)($biodata['reguler_locked'] ?? 0),
];

/* Cek apakah user sudah final di salah satu jalur */
$isLocked   = false;
$jalurFinal = null;
foreach ($jalurList as $jalur => $locked) {
    if ($locked === 1) {
        $isLocked   = true;
        $jalurFinal = $jalur;
        break;
    }
}
?>

<?php include "partials/header.php"; ?>
<?php include "partials/navbar.php"; ?>

<div class="dashboard-container">
    <h3 class="mb-4">
        Halo, <?= htmlspecialchars($user['nama_lengkap']) ?>
    </h3>

    <div class="row g-4">
        <!-- 1️⃣ Verifikasi Akun -->
        <div class="col-md-4">
            <div class="card-menu">
                <h4>1️⃣ Verifikasi Akun</h4>
                <p>Lengkapi dan verifikasi data diri Anda.</p>
                <?php if ($user['is_verified'] == 0): ?>
                    <?php if (!$hasBiodata): ?>
                        <a href="verifikasi_data.php" class="btn btn-primary w-100">Mulai Verifikasi</a>
                    <?php elseif (!$biodataFinal): ?>
                        <a href="verifikasi_final.php" class="btn btn-warning w-100">Finalisasi Akun</a>
                    <?php else: ?>
                        <span class="badge bg-success">Sudah Diverifikasi</span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="badge bg-success">Sudah Diverifikasi</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- 2️⃣ Pendaftaran -->
        <div class="col-md-4">
            <div class="card-menu <?= ($user['is_verified'] == 0 || $isLocked) ? 'locked' : '' ?>">
                <h4>2️⃣ Pendaftaran</h4>
                <p>Pilih jalur pendaftaran.</p>

                <?php if ($user['is_verified'] == 0): ?>
                    <button class="btn btn-secondary w-100" disabled>Verifikasi Dulu</button>
                <?php elseif ($isLocked): ?>
                    <button class="btn btn-secondary w-100" disabled>Pendaftaran Terkunci</button>
                    <span class="badge bg-success mt-2 d-block">
                        Jalur <?= $jalurFinal ?> telah difinalisasi
                    </span>
                <?php else: ?>
                    <button id="btnPilihJalur" class="btn btn-success w-100">Pilih Jalur</button>
                <?php endif; ?>
            </div>
        </div>

        <!-- 3️⃣ Cetak Kartu -->
        <div class="col-md-4">
            <div class="card-menu <?= !$isLocked ? 'locked' : '' ?>">
                <h4>3️⃣ Cetak Kartu Ujian</h4>
                <p>Kartu ujian resmi peserta.</p>
                <?php if ($isLocked): ?>
                    <a href="../cetak_kartu.php" class="btn btn-warning w-100">Cetak Kartu</a>
                <?php else: ?>
                    <button class="btn btn-secondary w-100" disabled>Belum Final</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- PILIH JALUR DINAMIS -->
    <?php if ($user['is_verified'] == 1 && !$isLocked): ?>
    <div class="row mt-4" id="jalurWrapper" style="display:none;">
        <?php foreach ($jalurList as $jalur => $locked): ?>
        <div class="col-md-3">
            <div class="jalur-card">
                <h5><?= $jalur ?></h5>
                <p>
                    <?php
                    if ($jalur === 'Afirmasi') echo 'Jalur afirmasi.';
                    elseif ($jalur === 'Zonasi') echo 'Jalur domisili.';
                    elseif ($jalur === 'Prestasi') echo 'Jalur prestasi Tahfizd, Akademik, Non-Akademik.';
                    elseif ($jalur === 'Reguler') echo 'Jalur reguler umum.';
                    ?>
                </p>
                <a href="<?= strtolower($jalur) ?>/step1_sekolah.php"
                   class="btn <?= $locked ? 'btn-secondary' : 'btn-success' ?> w-100"
                   <?= $locked ? 'disabled' : '' ?>>
                   Daftar
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php include "partials/footer.php"; ?>

<script>
document.getElementById("btnPilihJalur")?.addEventListener("click", function () {
    const wrapper = document.getElementById("jalurWrapper");
    wrapper.style.display = wrapper.style.display === "none" ? "flex" : "none";
});
</script>
