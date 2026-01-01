<?php
session_start();
require_once __DIR__ . "/../config/database.php";

/* =====================
   CEK LOGIN
===================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* =====================
   AMBIL DATA BIODATA
===================== */
$stmt = $pdo->prepare("SELECT * FROM peserta_biodata WHERE id_user = ?");
$stmt->execute([$user_id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    header("Location: verifikasi_data.php");
    exit;
}

$already_final = ((int)$data['biodata_final'] === 1);

/* =====================
   PROSES FINALISASI
===================== */
if (isset($_POST['finalisasi']) && !$already_final) {

    $pdo->beginTransaction();

    try {

        // Kunci biodata
        $stmt1 = $pdo->prepare("
            UPDATE peserta_biodata 
            SET biodata_final = 1
            WHERE id_user = ?
        ");
        $stmt1->execute([$user_id]);

        // Tandai user terverifikasi
        $stmt2 = $pdo->prepare("
            UPDATE users 
            SET is_verified = 1,
                status_pendaftaran = 'proses'
            WHERE id_user = ?
        ");
        $stmt2->execute([$user_id]);

        $pdo->commit();

        header("Location: dashboard.php");
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        die("Finalisasi gagal.");
    }
}

?>

<?php include "partials/header.php"; ?>
<?php include "partials/navbar.php"; ?>

<div class="form-box">
    <h3 class="mb-4">✅ Finalisasi Verifikasi Data Peserta</h3>

    <div class="alert alert-warning">
        <strong>Perhatian!</strong><br>
        Pastikan seluruh data berikut sudah benar.  
        Setelah <b>FINALISASI</b>, data <b>TIDAK DAPAT DIUBAH</b>.
    </div>

    <!-- A. DATA IDENTITAS -->
    <h5 class="section-title">A. Data Identitas</h5>
    <table class="table table-bordered">
        <tr><th>Nama Lengkap</th><td><?= htmlspecialchars($data['nama_lengkap']) ?></td></tr>
        <tr><th>Nama Panggilan</th><td><?= htmlspecialchars($data['nama_panggilan']) ?></td></tr>
        <tr><th>NIK</th><td><?= htmlspecialchars($data['nik']) ?></td></tr>
        <tr><th>NISN</th><td><?= htmlspecialchars($data['nisn']) ?></td></tr>
        <tr><th>No KK</th><td><?= htmlspecialchars($data['no_kk']) ?></td></tr>
    </table>

    <!-- B. DATA KELAHIRAN -->
    <h5 class="section-title mt-4">B. Data Kelahiran</h5>
    <table class="table table-bordered">
        <tr><th>Tempat Lahir</th><td><?= htmlspecialchars($data['tempat_lahir']) ?></td></tr>
        <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($data['tanggal_lahir']) ?></td></tr>
        <tr><th>Jenis Kelamin</th><td><?= $data['jenis_kelamin']=='L'?'Laki-laki':'Perempuan' ?></td></tr>
        <tr><th>Agama</th><td><?= htmlspecialchars($data['agama']) ?></td></tr>
        <tr><th>Kewarganegaraan</th><td><?= htmlspecialchars($data['kewarganegaraan']) ?></td></tr>
    </table>

    <!-- C. DATA KELUARGA -->
    <h5 class="section-title mt-4">C. Data Keluarga</h5>
    <table class="table table-bordered">
        <tr><th>Anak Ke-</th><td><?= htmlspecialchars($data['anak_ke']) ?></td></tr>
        <tr><th>Jumlah Saudara</th><td><?= htmlspecialchars($data['jumlah_saudara']) ?></td></tr>
        <tr><th>Status Keluarga</th><td><?= htmlspecialchars($data['status_keluarga']) ?></td></tr>
    </table>

    <!-- D. ALAMAT -->
    <h5 class="section-title mt-4">D. Alamat Lengkap</h5>
    <table class="table table-bordered">
        <tr><th>Jalan</th><td><?= htmlspecialchars($data['jalan']) ?></td></tr>
        <tr><th>RT / RW</th><td><?= htmlspecialchars($data['rt']) ?> / <?= htmlspecialchars($data['rw']) ?></td></tr>
        <tr><th>Kelurahan</th><td><?= htmlspecialchars($data['kelurahan']) ?></td></tr>
        <tr><th>Kecamatan</th><td><?= htmlspecialchars($data['kecamatan']) ?></td></tr>
        <tr><th>Kabupaten</th><td><?= htmlspecialchars($data['kabupaten']) ?></td></tr>
        <tr><th>Provinsi</th><td><?= htmlspecialchars($data['provinsi']) ?></td></tr>
        <tr><th>Kode Pos</th><td><?= htmlspecialchars($data['kode_pos']) ?></td></tr>
    </table>

    <!-- E. DATA TAMBAHAN -->
    <h5 class="section-title mt-4">E. Data Tambahan</h5>
    <table class="table table-bordered">
        <tr><th>Status Tinggal</th><td><?= htmlspecialchars($data['status_tinggal']) ?></td></tr>
        <tr><th>Jarak Sekolah</th><td><?= htmlspecialchars($data['jarak_sekolah']) ?></td></tr>
        <tr><th>Transportasi</th><td><?= htmlspecialchars($data['transportasi']) ?></td></tr>
        <tr><th>Tinggi Badan</th><td><?= htmlspecialchars($data['tinggi_badan']) ?> cm</td></tr>
        <tr><th>Berat Badan</th><td><?= htmlspecialchars($data['berat_badan']) ?> kg</td></tr>
        <tr><th>Kebutuhan Khusus</th><td><?= htmlspecialchars($data['kebutuhan_khusus']) ?></td></tr>
    </table>

    <!-- F. KONTAK -->
    <h5 class="section-title mt-4">F. Kontak</h5>
    <table class="table table-bordered">
        <tr><th>No HP</th><td><?= htmlspecialchars($data['no_hp']) ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($data['email']) ?></td></tr>
    </table>

    <!-- TOMBOL -->
    <div class="mt-4 text-end">
        <?php if ($already_final): ?>
            <a href="dashboard.php" class="btn btn-secondary px-5 py-2">
                Kembali ke Dashboard
            </a>
        <?php else: ?>
            <form method="post" class="d-inline">
                <button name="finalisasi" class="btn btn-danger px-5 py-2"
                        onclick="return confirm('Yakin finalisasi? Data tidak dapat diubah!')">
                    Finalisasi Data
                </button>
            </form>
            <a href="verifikasi_data.php" class="btn btn-outline-secondary px-4 py-2 ms-2">
                Kembali Edit
            </a>
        <?php endif; ?>
    </div>

</div>

<?php include "partials/footer.php"; ?>
