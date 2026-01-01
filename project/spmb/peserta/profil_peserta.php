<?php
session_start();
require_once __DIR__ . "/../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* =====================
   AMBIL DATA PESERTA
===================== */
$stmt = $pdo->prepare("SELECT * FROM peserta_biodata WHERE id_user = ?");
$stmt->execute([$user_id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$no_data = !$data;

/* =====================
   CEK STATUS FINAL
===================== */
$stmt_final = $pdo->prepare("SELECT biodata_final FROM peserta_biodata WHERE id_user = ?");
$stmt_final->execute([$user_id]);
$final_row = $stmt_final->fetch(PDO::FETCH_ASSOC);
$is_final = ($final_row && (int)$final_row['biodata_final'] === 1);

/* =====================
   PROSES FINALISASI
===================== */
if (isset($_POST['finalisasi']) && !$is_final) {
    // Update biodata_final
    $update_bio = $pdo->prepare("UPDATE peserta_biodata SET biodata_final = 1 WHERE id_user = ?");
    $update_bio->execute([$user_id]);

    // Update users.status_pendaftaran
    $update_user = $pdo->prepare("UPDATE users SET status_pendaftaran = 'final' WHERE id_user = ?");
    $update_user->execute([$user_id]);

    header("Location: profil.php");
    exit;
}
?>

<?php include "partials/header.php"; ?>
<?php include "partials/navbar.php"; ?>

<div class="form-box">
    <h3 class="mb-4">👤 Profil Peserta</h3>

    <?php if ($no_data): ?>
        <div class="alert alert-warning">
            <strong>Data belum tersedia</strong>. Silakan lengkapi data pribadi terlebih dahulu di 
            <a href="verifikasi_data.php">halaman verifikasi data</a>.
        </div>
    <?php else: ?>

        <!-- DATA IDENTITAS -->
        <h5 class="section-title">A. Data Identitas</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><strong>Nama Lengkap</strong></label>
                <p><?= htmlspecialchars($data['nama_lengkap'] ?? '-') ?></p>
            </div>
            <div class="col-md-6">
                <label class="form-label"><strong>Nama Panggilan</strong></label>
                <p><?= htmlspecialchars($data['nama_panggilan'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>NIK</strong></label>
                <p><?= htmlspecialchars($data['nik'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>NISN</strong></label>
                <p><?= htmlspecialchars($data['nisn'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>No. KK</strong></label>
                <p><?= htmlspecialchars($data['no_kk'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA PRIBADI -->
        <h5 class="section-title">B. Data Pribadi</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><strong>Tempat Lahir</strong></label>
                <p><?= htmlspecialchars($data['tempat_lahir'] ?? '-') ?></p>
            </div>
            <div class="col-md-6">
                <label class="form-label"><strong>Tanggal Lahir</strong></label>
                <p><?= htmlspecialchars($data['tanggal_lahir'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Jenis Kelamin</strong></label>
                <p><?= htmlspecialchars($data['jenis_kelamin'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Agama</strong></label>
                <p><?= htmlspecialchars($data['agama'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Kewarganegaraan</strong></label>
                <p><?= htmlspecialchars($data['kewarganegaraan'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA KELUARGA -->
        <h5 class="section-title">C. Data Keluarga</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label"><strong>Anak Ke-</strong></label>
                <p><?= htmlspecialchars($data['anak_ke'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Jumlah Saudara</strong></label>
                <p><?= htmlspecialchars($data['jumlah_saudara'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Status Keluarga</strong></label>
                <p><?= htmlspecialchars($data['status_keluarga'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA ALAMAT -->
        <h5 class="section-title">D. Data Alamat</h5>
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label"><strong>Jalan</strong></label>
                <p><?= htmlspecialchars($data['jalan'] ?? '-') ?></p>
            </div>
            <div class="col-md-2">
                <label class="form-label"><strong>RT</strong></label>
                <p><?= htmlspecialchars($data['rt'] ?? '-') ?></p>
            </div>
            <div class="col-md-2">
                <label class="form-label"><strong>RW</strong></label>
                <p><?= htmlspecialchars($data['rw'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Kelurahan/Nagari</strong></label>
                <p><?= htmlspecialchars($data['kelurahan'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Kecamatan</strong></label>
                <p><?= htmlspecialchars($data['kecamatan'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Kabupaten/Kota</strong></label>
                <p><?= htmlspecialchars($data['kabupaten'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Provinsi</strong></label>
                <p><?= htmlspecialchars($data['provinsi'] ?? '-') ?></p>
            </div>
            <div class="col-md-2">
                <label class="form-label"><strong>Kode Pos</strong></label>
                <p><?= htmlspecialchars($data['kode_pos'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA TEMPAT TINGGAL -->
        <h5 class="section-title">E. Data Tempat Tinggal</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label"><strong>Status Tinggal</strong></label>
                <p><?= htmlspecialchars($data['status_tinggal'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Jarak ke Sekolah (km)</strong></label>
                <p><?= htmlspecialchars($data['jarak_sekolah'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Transportasi</strong></label>
                <p><?= htmlspecialchars($data['transportasi'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA FISIK -->
        <h5 class="section-title">F. Data Fisik</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label"><strong>Tinggi Badan (cm)</strong></label>
                <p><?= htmlspecialchars($data['tinggi_badan'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Berat Badan (kg)</strong></label>
                <p><?= htmlspecialchars($data['berat_badan'] ?? '-') ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label"><strong>Kebutuhan Khusus</strong></label>
                <p><?= htmlspecialchars($data['kebutuhan_khusus'] ?? '-') ?></p>
            </div>
        </div>

        <!-- DATA KONTAK -->
        <h5 class="section-title">G. Data Kontak</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><strong>No. HP</strong></label>
                <p><?= htmlspecialchars($data['no_hp'] ?? '-') ?></p>
            </div>
            <div class="col-md-6">
                <label class="form-label"><strong>Email</strong></label>
                <p><?= htmlspecialchars($data['email'] ?? '-') ?></p>
            </div>
        </div>

        <!-- TOMBOL AKSI -->
        <div class="mt-5">
            <?php if (!$is_final): ?>
                <a href="verifikasi_data.php" class="btn btn-primary">Edit Data</a>
                <form method="post" style="display:inline-block;">
                    <button type="submit" name="finalisasi" class="btn btn-success">Finalisasi Data</button>
                </form>
            <?php else: ?>
                <span class="badge bg-success">Data sudah difinalisasi</span>
            <?php endif; ?>
            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        </div>

    <?php endif; ?>
</div>

<?php include "partials/footer.php"; ?>
