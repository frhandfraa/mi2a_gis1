<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI LOGIN ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* ================= VALIDASI SESSION ZONASI ================= */
if (!isset($_SESSION['zonasi'])) {
    header("Location: step3_ukurjarak.php");
    exit;
}

$zonasi = $_SESSION['zonasi'];

/* ================= AMBIL DATA PESERTA + JARAK ================= */
$stmt = $pdo->prepare("
    SELECT 
        nama_lengkap, nik, tempat_lahir, tanggal_lahir,
        jenis_kelamin, no_hp, alamat, kelurahan,
        kecamatan, kabupaten, provinsi,
        jarak_pilihan1, jarak_pilihan2
    FROM peserta_biodata
    WHERE id_biodata = :id
    LIMIT 1
");
$stmt->execute(['id' => $id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data || $data['jarak_pilihan1'] === null) {
    header("Location: step3_ukurjarak.php");
    exit;
}

/* ================= DATA NILAI ZONASI ================= */
$rata_per_semester = $zonasi['rata_per_semester'] ?? [];
$rata_total        = $zonasi['rata_total_rapor'] ?? null;

/* ================= DATA DOKUMEN ZONASI ================= */
$dokumen = $zonasi['dokumen'] ?? [];

$dokumen_final = [
    'kk'             => 'Kartu Keluarga',
    'ktp_wali'       => 'KTP Wali',
    'persetujuan'    => 'Surat Persetujuan',
    'foto'           => 'Pas Foto',
    'raport'         => 'Raport',
    'ijazah'         => 'Ijazah / SKL',
    'surat_domisili' => 'Surat Domisili'
];
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4 class="fw-bold mb-4">6️⃣ Finalisasi Pendaftaran Jalur Zonasi</h4>

<!-- ================= DATA PRIBADI ================= -->
<div class="card mb-4">
<div class="card-header bg-primary text-white fw-semibold">1️⃣ Data Pribadi</div>
<div class="card-body row">

<div class="col-md-6 mb-2"><strong>Nama</strong><div><?= htmlspecialchars($data['nama_lengkap']) ?></div></div>
<div class="col-md-6 mb-2"><strong>NIK</strong><div><?= htmlspecialchars($data['nik']) ?></div></div>
<div class="col-md-6 mb-2"><strong>Tempat Lahir</strong><div><?= htmlspecialchars($data['tempat_lahir']) ?></div></div>
<div class="col-md-6 mb-2"><strong>Tanggal Lahir</strong><div><?= htmlspecialchars($data['tanggal_lahir']) ?></div></div>
<div class="col-md-6 mb-2"><strong>Jenis Kelamin</strong><div><?= htmlspecialchars($data['jenis_kelamin']) ?></div></div>
<div class="col-md-6 mb-2"><strong>No HP</strong><div><?= htmlspecialchars($data['no_hp']) ?></div></div>

<div class="col-12 mt-2">
<strong>Alamat</strong>
<div>
<?= htmlspecialchars($data['alamat']) ?><br>
Desa <?= htmlspecialchars($data['kelurahan']) ?>,
Kecamatan <?= htmlspecialchars($data['kecamatan']) ?>,
<?= htmlspecialchars($data['kabupaten']) ?>,
<?= htmlspecialchars($data['provinsi']) ?>
</div>
</div>

</div>
</div>

<!-- ================= PILIHAN ZONASI ================= -->
<div class="card mb-4">
<div class="card-header bg-success text-white fw-semibold">2️⃣ Pilihan Sekolah (Zonasi)</div>
<div class="card-body">
<p><strong>Pilihan 1:</strong>
<?= $zonasi['pilihan_jurusan']['pilihan1']['sekolah'] ?? '-' ?> -
<?= $zonasi['pilihan_jurusan']['pilihan1']['jurusan'] ?? '-' ?>
</p>

<p><strong>Pilihan 2:</strong>
<?= $zonasi['pilihan_jurusan']['pilihan2']['sekolah'] ?? 'Tidak memilih' ?> -
<?= $zonasi['pilihan_jurusan']['pilihan2']['jurusan'] ?? '' ?>
</p>
</div>
</div>

<!-- ================= JARAK ================= -->
<div class="card mb-4">
<div class="card-header bg-secondary text-white fw-semibold">3️⃣ Jarak Domisili</div>
<div class="card-body">

<p>
<strong>Pilihan 1:</strong><br>
<span class="badge bg-primary">
<?= number_format($data['jarak_pilihan1'], 2) ?> km
</span>
</p>

<p>
<strong>Pilihan 2:</strong><br>
<?php if ($data['jarak_pilihan2'] !== null): ?>
<span class="badge bg-primary">
<?= number_format($data['jarak_pilihan2'], 2) ?> km
</span>
<?php else: ?>
<span class="text-muted">Tidak memilih sekolah kedua</span>
<?php endif; ?>
</p>

</div>
</div>

<!-- ================= NILAI ================= -->
<div class="card mb-4">
<div class="card-header bg-warning text-white fw-semibold">4️⃣ Nilai Raport</div>
<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
    <th>Semester</th>
    <th>Rata-rata</th>
</tr>
</thead>
<tbody>

<?php foreach ($rata_per_semester as $sem => $rata): ?>
<tr>
    <td><?= strtoupper($sem) ?></td>
    <td><?= number_format($rata,2) ?></td>
</tr>
<?php endforeach; ?>

<tr class="table-success fw-bold">
    <td>Rata-rata Total</td>
    <td><?= $rata_total !== null ? number_format($rata_total,2) : '-' ?></td>
</tr>

</tbody>
</table>

</div>
</div>

<!-- ================= DOKUMEN ================= -->
<div class="card mb-4">
<div class="card-header bg-info text-white fw-semibold">5️⃣ Dokumen</div>
<div class="card-body d-flex flex-wrap gap-3">

<?php foreach ($dokumen_final as $k => $label): ?>
<div class="border rounded p-3">
<strong><?= $label ?></strong><br>
<?= isset($dokumen[$k])
    ? "<a href='../../uploads/zonasi/{$dokumen[$k]}' target='_blank'>Lihat</a>"
    : "<span class='text-muted'>Belum</span>" ?>
</div>
<?php endforeach; ?>

</div>
</div>

<!-- ================= FINALISASI ================= -->
<div class="card">
<div class="card-body">

<div class="form-check mb-3">
<input type="checkbox" id="cekValid" class="form-check-input">
<label class="form-check-label">
Saya menyatakan seluruh data pendaftaran zonasi sudah benar
</label>
</div>

<form action="step7_zonasi_kunci.php" method="post">
<input type="hidden" name="finalisasi" value="1">
<button id="btnFinal" class="btn btn-success" disabled>
🔒 Finalisasi & Kunci Data
</button>
</form>

</div>
</div>

</div>

<script>
document.getElementById('cekValid').addEventListener('change', function(){
    document.getElementById('btnFinal').disabled = !this.checked;
});
</script>

<?php include "../partials/footer.php"; ?>
