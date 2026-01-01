<?php
session_start();
require_once __DIR__ . "/config/database.php";

/* =====================
   CEK LOGIN
===================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* =====================
   AMBIL DATA PESERTA
===================== */
$stmt = $pdo->prepare("
    SELECT 
        u.nama_lengkap,
        u.status_pendaftaran,
        b.nik,
        b.tempat_lahir,
        b.tanggal_lahir,
        b.no_hp,
        b.afirmasi_locked,
        b.zonasi_locked,
        b.prestasi_locked,
        b.reguler_locked,      -- tambahkan kolom reguler
        s.nama_sekolah AS sekolah_asal
    FROM users u
    LEFT JOIN peserta_biodata b ON b.id_user = u.id_user
    LEFT JOIN peserta_sekolah_asal s ON s.id_user = u.id_user
    WHERE u.id_user = ?
    LIMIT 1
");
$stmt->execute([$id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

/* =====================
   VALIDASI FINAL
===================== */
if (!$data || $data['status_pendaftaran'] !== 'final') {
    // Belum final → kembali ke dashboard
    header("Location: peserta/dashboard.php");
    exit;
}

/* =====================
   TENTUKAN JALUR PESERTA
===================== */
if ((int) $data['afirmasi_locked'] === 1) {
    $jalur = "Afirmasi";
} elseif ((int) $data['zonasi_locked'] === 1) {
    $jalur = "Zonasi";
} elseif ((int) $data['prestasi_locked'] === 1) {
    $jalur = "Prestasi";
} elseif ((int) $data['reguler_locked'] === 1) {
    $jalur = "Reguler";   // Tambahkan jalur Reguler
} else {
    $jalur = "Belum Memilih Jalur";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kartu Ujian Peserta</title>
<style>
body { font-family: Arial, sans-serif; background: #f5f5f5; }
.card { width: 800px; margin: 30px auto; border-radius: 18px; padding: 25px; background: #fff; box-shadow: 0 10px 25px rgba(0,0,0,.08); }
.header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
.header h2 { margin: 0; font-weight: 700; }
.header p { margin: 2px 0; font-size: 14px; }
.data table { width: 100%; border-collapse: collapse; }
.data td { padding: 8px 6px; vertical-align: top; }
.data td:first-child { font-weight: 600; width: 200px; }
.footer { margin-top: 25px; display: flex; justify-content: space-between; }
.print-btn { text-align: center; margin-top: 25px; }
.print-btn button { border-radius: 12px; font-weight: 600; padding: 10px 25px; cursor: pointer; background-color: #0ea5e9; color: #fff; border: none; }
@media print { .print-btn { display: none; } body { background: #fff; } }
</style>
</head>

<body>

<div class="card">
    <div class="header">
        <h2>KARTU UJIAN PESERTA</h2>
        <p>SPMB SMK TAHUN <?= date('Y') ?></p>
    </div>

    <div class="data">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <?= htmlspecialchars($data['nama_lengkap'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: <?= htmlspecialchars($data['nik'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Tempat, Tgl Lahir</td>
                <td>: <?= htmlspecialchars($data['tempat_lahir'] ?? '-') ?>, <?= htmlspecialchars($data['tanggal_lahir'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Sekolah Asal</td>
                <td>: <?= htmlspecialchars($data['sekolah_asal'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>: <?= htmlspecialchars($data['no_hp'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Jalur Pendaftaran</td>
                <td>: <?= htmlspecialchars($jalur) ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: <strong>FINAL</strong></td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div>
            <p>Peserta</p><br>
            <strong><?= htmlspecialchars($data['nama_lengkap'] ?? '-') ?></strong>
        </div>
        <div>
            <p>Panitia SPMB</p><br>
            <strong>(.....................)</strong>
        </div>
    </div>
</div>

<div class="print-btn">
    <a href="peserta/dashboard.php"
       style="background:#6b7280;color:#fff;
              padding:10px 25px;border-radius:12px;
              text-decoration:none;font-weight:600;">
        ⬅️ Kembali ke Dashboard
    </a>
    <br><br>
    <button onclick="window.print()">🖨️ Cetak Kartu</button>
</div>

</body>
</html>
