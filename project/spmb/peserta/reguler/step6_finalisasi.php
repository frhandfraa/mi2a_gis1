<?php
session_start();
require_once "../../config/database.php";

/* =====================================================
   VALIDASI LOGIN & SESSION REGULER
===================================================== */
if (!isset($_SESSION['user_id']) || !isset($_SESSION['reguler']['nilai'])) {
    header("Location: step4_nilai.php");
    exit;
}
$id_user = $_SESSION['user_id'];
$reguler = $_SESSION['reguler'];

/* =====================================================
   AMBIL DATA BIODATA
===================================================== */
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

/* =====================================================
   FUNSI AMBIL NAMA SEKOLAH
===================================================== */
function getNamaSekolah($pdo, $idSekolah) {
    if (!$idSekolah) return '-';
    $stmt = $pdo->prepare("SELECT nama_smk FROM smk WHERE id_smk = :id LIMIT 1");
    $stmt->execute(['id' => $idSekolah]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['nama_smk'] : '-';
}

/* =====================================================
   NORMALISASI PILIHAN SEKOLAH
===================================================== */
$pilihanJurusan = $reguler['pilihan_jurusan'] ?? [];

function normalisasiPilihan($pilihan, $pdo) {
    $namaSekolah = $pilihan['sekolah'] ?? $pilihan['nama_smk'] ?? null;

    // Jika berupa ID, ambil nama dari tabel sekolah
    if (is_numeric($namaSekolah)) {
        $namaSekolah = getNamaSekolah($pdo, $namaSekolah);
    }

    return [
        'sekolah' => $namaSekolah ?? '-',
        'jurusan' => $pilihan['jurusan'] ?? '-'
    ];
}

$pilihan1 = normalisasiPilihan($pilihanJurusan['pilihan1'] ?? [], $pdo);
$pilihan2 = normalisasiPilihan($pilihanJurusan['pilihan2'] ?? [], $pdo);

/* =====================================================
   DATA AKADEMIK
===================================================== */
$nilai = $reguler['nilai'] ?? [];
$rapor_mapel       = $nilai['rapor'] ?? [];
$rata_per_semester = $nilai['rata_per_semester'] ?? [];
$rata_total        = $nilai['rata_total_rapor'] ?? 0;
$ijazah            = $nilai['ijazah'] ?? [];

/* =====================================================
   DATA DOKUMEN
===================================================== */
$dokumen = $reguler['dokumen'] ?? [];
$dokumen_final = [
    'kk'             => 'Kartu Keluarga',
    'ktp_wali'       => 'KTP Wali',
    'persetujuan'    => 'Surat Persetujuan',
    'foto'           => 'Pas Foto',
    'raport'         => 'Raport',
    'ijazah'         => 'Ijazah / SKL',
    'surat_domisili' => 'Surat Domisili'
];

/* =====================================================
   SET SESSION FINAL REGULER
===================================================== */
$_SESSION['reguler_final'] = true;
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4 class="fw-bold mb-4">6️⃣ Finalisasi Pendaftaran Jalur Reguler</h4>

<!-- ================= DATA PRIBADI ================= -->
<div class="card mb-4">
<div class="card-header bg-primary text-white fw-semibold">1️⃣ Data Pribadi</div>
<div class="card-body row">
<?php
$field = [
    'Nama Lengkap' => $data['nama_lengkap'],
    'NIK' => $data['nik'],
    'Tempat Lahir' => $data['tempat_lahir'],
    'Tanggal Lahir' => $data['tanggal_lahir'],
    'Jenis Kelamin' => $data['jenis_kelamin'],
    'No HP' => $data['no_hp']
];
foreach ($field as $label => $value):
?>
<div class="col-md-6 mb-2">
<strong><?= $label ?></strong>
<div><?= htmlspecialchars($value) ?></div>
</div>
<?php endforeach; ?>
<div class="col-12 mt-2">
<strong>Alamat Lengkap</strong>
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

<!-- ================= PILIHAN SEKOLAH ================= -->
<div class="card mb-4">
<div class="card-header bg-success text-white fw-semibold">2️⃣ Pilihan Sekolah</div>
<div class="card-body">
<p><strong>Pilihan 1</strong><br>
<?= htmlspecialchars($pilihan1['sekolah']) ?><br>
<span class="text-muted">Jurusan: <?= htmlspecialchars($pilihan1['jurusan']) ?></span></p>

<hr>
<p><strong>Pilihan 2</strong><br>
<?= $pilihan2['sekolah'] !== '-' 
    ? htmlspecialchars($pilihan2['sekolah']) . "<br><span class='text-muted'>Jurusan: " . htmlspecialchars($pilihan2['jurusan']) . "</span>"
    : "<span class='text-muted'>Tidak memilih</span>" ?>
</p>
</div>
</div>

<!-- ================= JARAK DOMISILI ================= -->
<div class="card mb-4">
<div class="card-header bg-secondary text-white fw-semibold">3️⃣ Jarak Domisili ke Sekolah</div>
<div class="card-body">
<p><strong>Pilihan 1</strong><br>
<?= htmlspecialchars($pilihan1['sekolah']) ?><br>
<span class="badge bg-primary"><?= number_format($data['jarak_pilihan1'], 2) ?> km</span></p>

<hr>
<p><strong>Pilihan 2</strong><br>
<?php if ($data['jarak_pilihan2'] !== null): ?>
    <?= htmlspecialchars($pilihan2['sekolah']) ?><br>
    <span class="badge bg-primary"><?= number_format($data['jarak_pilihan2'], 2) ?> km</span>
<?php else: ?>
    <span class="text-muted">Tidak memilih</span>
<?php endif; ?>
</p>
</div>
</div>

<!-- ================= DATA AKADEMIK ================= -->
<div class="card mb-4">
<div class="card-header bg-warning fw-semibold">4️⃣ Data Akademik</div>
<div class="card-body">
<?php if ($rapor_mapel): ?>
<?php foreach ($rapor_mapel as $semester => $mapel): ?>
<h6 class="fw-bold mt-3"><?= strtoupper($semester) ?></h6>
<table class="table table-bordered text-center">
<thead class="table-light">
<tr>
<th>Matematika</th>
<th>B. Indonesia</th>
<th>B. Inggris</th>
<th>IPA</th>
<th>IPS</th>
</tr>
</thead>
<tbody>
<tr>
<td><?= $mapel['matematika'] ?></td>
<td><?= $mapel['bindo'] ?></td>
<td><?= $mapel['bing'] ?></td>
<td><?= $mapel['ipa'] ?></td>
<td><?= $mapel['ips'] ?></td>
</tr>
</tbody>
</table>
<p class="text-muted">Rata-rata Semester: <strong><?= number_format($rata_per_semester[$semester] ?? 0, 2) ?></strong></p>
<?php endforeach; ?>
<?php else: ?>
<p class="text-muted">Data rapor belum tersedia.</p>
<?php endif; ?>

<hr>
<p><strong>Rata-rata Total Rapor:</strong>
<span class="badge bg-success fs-6"><?= number_format($rata_total, 2) ?></span></p>

<p><strong>No Ijazah:</strong> <?= htmlspecialchars($ijazah['no_ijazah'] ?? '-') ?></p>
<p><strong>Nilai Ijazah:</strong> <?= htmlspecialchars($ijazah['nilai'] ?? '-') ?></p>
</div>
</div>

<!-- ================= DOKUMEN ================= -->
<div class="card mb-4">
<div class="card-header bg-info text-white fw-semibold">5️⃣ Dokumen Pendukung</div>
<div class="card-body d-flex flex-wrap gap-3">
<?php foreach ($dokumen_final as $key => $label): ?>
<div class="border rounded p-3" style="min-width:200px">
<strong><?= $label ?></strong><br>
<?= !empty($dokumen[$key])
    ? "<a href='../../uploads/reguler/{$dokumen[$key]}' target='_blank'>Lihat Dokumen</a>"
    : "<span class='text-muted'>Belum upload</span>"
?>
</div>
<?php endforeach; ?>
</div>
</div>

<!-- ================= FINALISASI ================= -->
<div class="card mb-5">
<div class="card-body">
<div class="form-check mb-3">
<input type="checkbox" id="cekValid" class="form-check-input">
<label class="form-check-label">
Saya menyatakan seluruh data yang saya isi adalah benar dan siap dikunci
</label>
</div>

<form action="step7_reguler_kunci.php" method="post">
<input type="hidden" name="finalisasi" value="1">
<button id="btnFinal" class="btn btn-success" disabled>
🔒 Finalisasi & Kunci Data
</button>
</form>
</div>
</div>
</div>

<script>
document.getElementById('cekValid').addEventListener('change', function () {
    document.getElementById('btnFinal').disabled = !this.checked;
});
</script>

<?php include "../partials/footer.php"; ?>
