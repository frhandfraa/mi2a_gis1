<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI SESSION ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* ================= AMBIL DATA PESERTA ================= */
$stmt = $pdo->prepare("SELECT * FROM peserta_biodata WHERE id_biodata = :id_biodata LIMIT 1");
$stmt->execute(['id_biodata' => $id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data peserta tidak ditemukan.");
}

/* ================= DATA AFIRMASI (DARI SESSION) ================= */
$afirmasi = $_SESSION['afirmasi'] ?? [];

$kategori = $afirmasi['jenis'] ?? '-';
$nilai    = $afirmasi['nilai'] ?? [];
$ijazah   = $afirmasi['ijazah'] ?? [];
$dokumen  = $afirmasi['dokumen'] ?? [];

/* ================= DOKUMEN ================= */
$dokumen_umum = [
    'kk'        => 'Kartu Keluarga',
    'ktp_wali'  => 'KTP Wali',
    'foto'      => 'Foto Peserta'
];

$dokumen_khusus = [];
switch ($kategori) {
    case 'tidak_mampu':
        $dokumen_khusus = [
            'kip'  => 'KIP / PKH / KKS',
            'sktm' => 'Surat Keterangan Tidak Mampu'
        ];
        break;
    case 'panti':
        $dokumen_khusus = [
            'surat_panti'  => 'Surat Panti',
            'rekom_dinsos' => 'Rekomendasi Dinsos'
        ];
        break;
    case 'yatim':
        $dokumen_khusus = [
            'akta_kematian' => 'Akta Kematian',
            'kk_khusus'     => 'Kartu Keluarga'
        ];
        break;
    case '3t':
        $dokumen_khusus = [
            'surat_domisili' => 'Surat Domisili',
            'rekom_desa'     => 'Rekomendasi Desa'
        ];
        break;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4 class="mb-4 fw-bold">6️⃣ Finalisasi Data Pendaftaran</h4>

<!-- ================= DATA PRIBADI ================= -->
<div class="card mb-4">
<div class="card-header bg-primary text-white fw-semibold">1️⃣ Data Pribadi</div>
<div class="card-body row">

<div class="col-md-6 mb-3"><strong>Nama Lengkap</strong><div><?= htmlspecialchars($data['nama_lengkap']) ?></div></div>
<div class="col-md-6 mb-3"><strong>NIK</strong><div><?= htmlspecialchars($data['nik']) ?></div></div>
<div class="col-md-6 mb-3"><strong>Tempat Lahir</strong><div><?= htmlspecialchars($data['tempat_lahir']) ?></div></div>
<div class="col-md-6 mb-3"><strong>Tanggal Lahir</strong><div><?= htmlspecialchars($data['tanggal_lahir']) ?></div></div>
<div class="col-md-6 mb-3"><strong>Jenis Kelamin</strong><div><?= htmlspecialchars($data['jenis_kelamin']) ?></div></div>
<div class="col-md-6 mb-3"><strong>No HP</strong><div><?= htmlspecialchars($data['no_hp']) ?></div></div>

<div class="col-12">
<strong>Alamat Lengkap</strong>
<div>
<?= htmlspecialchars($data['alamat']) ?><br>
Desa <?= htmlspecialchars($data['kelurahan']) ?>, Kecamatan <?= htmlspecialchars($data['kecamatan']) ?>
<?= htmlspecialchars($data['kabupaten']) ?>, <?= htmlspecialchars($data['provinsi']) ?>
</div>
</div>


</div>
</div>

<!-- ================= AFIRMASI ================= -->
<div class="card mb-4">
<div class="card-header bg-success text-white fw-semibold">2️⃣ Data Afirmasi & Pilihan</div>
<div class="card-body">
<p><strong>Jenis Afirmasi:</strong> <?= htmlspecialchars($kategori) ?></p>
<p><strong>Pilihan 1:</strong> <?= $afirmasi['pilihan_jurusan']['pilihan1']['sekolah'] ?? '-' ?> - <?= $afirmasi['pilihan_jurusan']['pilihan1']['jurusan'] ?? '-' ?></p>
<p><strong>Pilihan 2:</strong> <?= $afirmasi['pilihan_jurusan']['pilihan2']['sekolah'] ?? '-' ?> - <?= $afirmasi['pilihan_jurusan']['pilihan2']['jurusan'] ?? '-' ?></p>
</div>
</div>

<!-- ================= NILAI ================= -->
<div class="card mb-4">
<div class="card-header bg-warning text-white fw-semibold">3️⃣ Nilai Raport & Ijazah</div>
<div class="card-body">

<table class="table table-bordered">
<thead><tr><th>Semester</th><th>Nilai</th></tr></thead>
<tbody>
<?php
$total = 0; $count = count($nilai);
foreach ($nilai as $s => $n):
$total += $n;
?>
<tr><td>Semester <?= $s ?></td><td><?= $n ?></td></tr>
<?php endforeach; ?>
<tr><th>Rata-rata</th><th><?= $count ? round($total/$count,2) : '-' ?></th></tr>
</tbody>
</table>

<p><strong>Ijazah:</strong> <?= $ijazah['nilai'] ?? '-' ?> | No: <?= $ijazah['nomor'] ?? '-' ?></p>

</div>
</div>

<!-- ================= DOKUMEN ================= -->
<div class="card mb-4">
<div class="card-header bg-info text-white fw-semibold">4️⃣ Dokumen</div>
<div class="card-body">

<h6>Dokumen Umum</h6>
<div class="d-flex flex-wrap gap-3 mb-3">
<?php foreach ($dokumen_umum as $k => $v): ?>
<div class="dokumen-card">
<div class="dokumen-label"><?= $v ?></div>
<?= isset($dokumen[$k]) ? "<a href='{$dokumen[$k]}' target='_blank'>Lihat</a>" : "<span class='text-muted'>Belum</span>" ?>
</div>
<?php endforeach; ?>
</div>

<h6>Dokumen Khusus</h6>
<div class="d-flex flex-wrap gap-3">
<?php foreach ($dokumen_khusus as $k => $v): ?>
<div class="dokumen-card">
<div class="dokumen-label"><?= $v ?></div>
<?= isset($dokumen[$k]) ? "<a href='{$dokumen[$k]}' target='_blank'>Lihat</a>" : "<span class='text-muted'>Belum</span>" ?>
</div>
<?php endforeach; ?>
</div>

</div>
</div>

<!-- ================= FINALISASI ================= -->
<div class="card">
<div class="card-body">
<div class="form-check mb-3">
<input type="checkbox" id="validasi" class="form-check-input">
<label class="form-check-label">Saya menyatakan data sudah benar</label>
</div>
<form action="step7_afirmasi_kunci.php" method="post">
    <input type="hidden" name="finalisasi" value="1">
    <button id="btnFinalisasi" class="btn btn-success" disabled>
        🔒 Finalisasi & Kunci Data
    </button>
</form>
</div>
</div>

</div>

<script>
document.getElementById('validasi').addEventListener('change', e => {
document.getElementById('btnFinalisasi').disabled = !e.target.checked;
});
</script>

<?php include "../partials/footer.php"; ?>
