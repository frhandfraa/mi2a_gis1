<?php
session_start();
require_once "../../config/database.php";

/* =====================
   CEK LOGIN
===================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* =====================
   CEK JALUR YANG SUDAH FINAL
===================== */
$stmtCheck = $pdo->prepare("
    SELECT afirmasi_locked, zonasi_locked, prestasi_locked, reguler_locked
    FROM peserta_biodata
    WHERE id_user = ?
    LIMIT 1
");
$stmtCheck->execute([$id_user]);
$status = $stmtCheck->fetch(PDO::FETCH_ASSOC);

if ($status) {
    if ((int)$status['afirmasi_locked'] === 1) $lockedJalur = 'Afirmasi';
    elseif ((int)$status['zonasi_locked'] === 1) $lockedJalur = 'Zonasi';
    elseif ((int)$status['prestasi_locked'] === 1) $lockedJalur = 'Prestasi';
    elseif ((int)$status['reguler_locked'] === 1) $lockedJalur = 'Reguler';
    else $lockedJalur = null;

    if ($lockedJalur && $lockedJalur !== 'Reguler') {
        // User sudah final di jalur lain → blokir akses
        die("Anda sudah final di jalur $lockedJalur. Tidak bisa mendaftar Reguler.");
    }
}

/* =====================
   AMBIL DATA SEKOLAH JIKA SUDAH ADA
===================== */
$stmt = $pdo->prepare("SELECT * FROM peserta_sekolah_asal WHERE id_user = ?");
$stmt->execute([$id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

/* =====================
   SIMPAN DATA
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "
        INSERT INTO peserta_sekolah_asal
        (id_user, nama_sekolah, npsn, status_sekolah, jenjang, alamat, desa, kecamatan, kabupaten, provinsi)
        VALUES (?,?,?,?,?,?,?,?,?,?)
        ON DUPLICATE KEY UPDATE
            nama_sekolah = VALUES(nama_sekolah),
            npsn = VALUES(npsn),
            status_sekolah = VALUES(status_sekolah),
            jenjang = VALUES(jenjang),
            alamat = VALUES(alamat),
            desa = VALUES(desa),
            kecamatan = VALUES(kecamatan),
            kabupaten = VALUES(kabupaten),
            provinsi = VALUES(provinsi)
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $id_user,
        $_POST['nama_sekolah'],
        $_POST['npsn'],
        $_POST['status_sekolah'],
        $_POST['jenjang'],
        $_POST['alamat'],
        $_POST['desa'],
        $_POST['kecamatan'],
        $_POST['kabupaten'],
        $_POST['provinsi']
    ]);

    // Set session agar step2_reguler bisa diakses
    $_SESSION['reguler']['sekolah'] = $id_user;

    header("Location: step2_jurusan.php");
    exit;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">1️⃣ Data Sekolah Asal (Jalur Reguler)</h4>

            <form method="POST">
                <div class="row g-3">
                    <!-- Nama Sekolah & NPSN -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control"
                               value="<?= $data['nama_sekolah'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NPSN Sekolah</label>
                        <input type="text" name="npsn" class="form-control"
                               value="<?= $data['npsn'] ?? '' ?>" required>
                    </div>

                    <!-- Status & Jenjang Sekolah -->
                    <div class="col-md-6">
                        <label class="form-label">Status Sekolah</label>
                        <select name="status_sekolah" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Negeri" <?= ($data['status_sekolah'] ?? '')=='Negeri'?'selected':'' ?>>Negeri</option>
                            <option value="Swasta" <?= ($data['status_sekolah'] ?? '')=='Swasta'?'selected':'' ?>>Swasta</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenjang Sekolah</label>
                        <select name="jenjang" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="SMP" <?= ($data['jenjang'] ?? '')=='SMP'?'selected':'' ?>>SMP</option>
                            <option value="MTs" <?= ($data['jenjang'] ?? '')=='MTs'?'selected':'' ?>>MTs</option>
                            <option value="Paket B" <?= ($data['jenjang'] ?? '')=='Paket B'?'selected':'' ?>>Paket B</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div class="col-12">
                        <label class="form-label">Alamat Sekolah</label>
                        <textarea name="alamat" class="form-control" rows="2"><?= $data['alamat'] ?? '' ?></textarea>
                    </div>

                    <!-- Desa, Kecamatan, Kabupaten, Provinsi -->
                    <div class="col-md-6">
                        <label class="form-label">Desa / Kelurahan</label>
                        <input type="text" name="desa" class="form-control"
                               value="<?= $data['desa'] ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control"
                               value="<?= $data['kecamatan'] ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kabupaten / Kota</label>
                        <input type="text" name="kabupaten" class="form-control"
                               value="<?= $data['kabupaten'] ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control"
                               value="<?= $data['provinsi'] ?? '' ?>">
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between">
                    <a href="../dashboard.php" class="btn btn-outline-secondary">
                        ⬅ Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Simpan & Lanjut ➜
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include "../partials/footer.php"; ?>
