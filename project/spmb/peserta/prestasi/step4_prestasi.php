<?php
session_start();
require_once "../../config/database.php";

/* ================== AUTH ================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
$id_user = $_SESSION['user_id'];

/* ================== VALIDASI STEP 3 ================== */
if (!isset($_SESSION['prestasi']['jarak'])) {
    header("Location: step3_ukurjarak.php");
    exit;
}

/* ================== AMBIL DATA (JIKA ADA) ================== */
$stmt = $pdo->prepare("SELECT jenis_prestasi FROM peserta_prestasi WHERE id_user = ?");
$stmt->execute([$id_user]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$prestasiDB = [];
if ($row && $row['jenis_prestasi']) {
    $prestasiDB = json_decode($row['jenis_prestasi'], true);
}

/* ================== SIMPAN DATA ================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $prestasi = [];

    /* -------- TAHFIZD -------- */
    if ($_POST['jenis_prestasi'] === 'tahfizd') {
        $prestasi = [
            'jenis' => 'tahfizd',
            'jumlah_juz' => $_POST['jumlah_juz'] ?? '',
            'juz_detail' => $_POST['juz_detail'] ?? ''
        ];
    }

    /* -------- AKADEMIK -------- */
    if ($_POST['jenis_prestasi'] === 'akademik') {
        $prestasi = [
            'jenis' => 'akademik',
            'nama_lomba' => $_POST['nama_lomba_akademik'] ?? '',
            'bidang' => $_POST['bidang_akademik'] ?? '',
            'tingkat' => $_POST['tingkat_akademik'] ?? '',
            'juara' => $_POST['juara_akademik'] ?? ''
        ];
    }

    /* -------- NON AKADEMIK -------- */
    if ($_POST['jenis_prestasi'] === 'non_akademik') {
        $prestasi = [
            'jenis' => 'non_akademik',
            'nama_kegiatan' => $_POST['nama_kegiatan_non'] ?? '',
            'kategori' => $_POST['kategori_non'] ?? '',
            'tingkat' => $_POST['tingkat_non'] ?? '',
            'juara' => $_POST['juara_non'] ?? ''
        ];
    }

    /* ================== INSERT / UPDATE ================== */
    $stmt = $pdo->prepare("
        INSERT INTO peserta_prestasi (id_user, jenis_prestasi)
        VALUES (:id_user, :jenis_prestasi)
        ON DUPLICATE KEY UPDATE
        jenis_prestasi = VALUES(jenis_prestasi)
    ");
    $stmt->execute([
        'id_user' => $id_user,
        'jenis_prestasi' => json_encode($prestasi)
    ]);

    $_SESSION['prestasi']['data'] = $prestasi;

    header("Location: step5_nilai.php");
    exit;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container mt-4">
<h4 class="fw-bold mb-4">4️⃣ Input Prestasi</h4>

<form method="POST">

<select name="jenis_prestasi" id="jenisPrestasi" class="form-select mb-3" required>
    <option value="">-- Pilih Jenis Prestasi --</option>
    <option value="tahfizd" <?= ($prestasiDB['jenis'] ?? '')=='tahfizd'?'selected':'' ?>>Tahfizd</option>
    <option value="akademik" <?= ($prestasiDB['jenis'] ?? '')=='akademik'?'selected':'' ?>>Akademik</option>
    <option value="non_akademik" <?= ($prestasiDB['jenis'] ?? '')=='non_akademik'?'selected':'' ?>>Non Akademik</option>
</select>

<!-- TAHFIZD -->
<div id="tahfizd" style="display:none;">
    <input type="number" name="jumlah_juz" class="form-control mb-2"
           value="<?= $prestasiDB['jumlah_juz'] ?? '' ?>" placeholder="Jumlah Juz">
    <input type="text" name="juz_detail" class="form-control"
           value="<?= $prestasiDB['juz_detail'] ?? '' ?>" placeholder="Detail Juz">
</div>

<!-- AKADEMIK -->
<div id="akademik" style="display:none;">
    <input type="text" name="nama_lomba_akademik" class="form-control mb-2"
           value="<?= $prestasiDB['nama_lomba'] ?? '' ?>" placeholder="Nama Lomba Akademik">
    <input type="text" name="bidang_akademik" class="form-control mb-2"
           value="<?= $prestasiDB['bidang'] ?? '' ?>" placeholder="Bidang Akademik">
    <select name="tingkat_akademik" class="form-select mb-2">
        <option value="">-- Tingkat --</option>
        <?php foreach(['Kecamatan','Kabupaten/Kota','Provinsi','Nasional','Internasional'] as $t): ?>
            <option value="<?= $t ?>" <?= ($prestasiDB['tingkat']??'')==$t?'selected':'' ?>><?= $t ?></option>
        <?php endforeach ?>
    </select>
    <input type="text" name="juara_akademik" class="form-control" value="<?= $prestasiDB['juara'] ?? '' ?>" placeholder="Juara">
</div>

<!-- NON AKADEMIK -->
<div id="nonAkademik" style="display:none;">
    <input type="text" name="nama_kegiatan_non" class="form-control mb-2"
           value="<?= $prestasiDB['nama_kegiatan'] ?? '' ?>" placeholder="Nama Kegiatan">
    <input type="text" name="kategori_non" class="form-control mb-2"
           value="<?= $prestasiDB['kategori'] ?? '' ?>" placeholder="Kategori">
    <select name="tingkat_non" class="form-select mb-2">
        <option value="">-- Tingkat --</option>
        <?php foreach(['Kecamatan','Kabupaten/Kota','Provinsi','Nasional','Internasional'] as $t): ?>
            <option value="<?= $t ?>" <?= ($prestasiDB['tingkat']??'')==$t?'selected':'' ?>><?= $t ?></option>
        <?php endforeach ?>
    </select>
    <input type="text" name="juara_non" class="form-control" value="<?= $prestasiDB['juara'] ?? '' ?>" placeholder="Juara">
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="step3_ukurjarak.php" class="btn btn-outline-secondary">⬅ Kembali</a>
    <button class="btn btn-primary">Simpan & Lanjut ➜</button>
</div>
</form>
</div>

<script>
const jenis = document.getElementById('jenisPrestasi');
const tahfizd = document.getElementById('tahfizd');
const akademik = document.getElementById('akademik');
const nonAkademik = document.getElementById('nonAkademik');

function toggle() {
    tahfizd.style.display = akademik.style.display = nonAkademik.style.display = 'none';
    if (jenis.value === 'tahfizd') tahfizd.style.display = 'block';
    if (jenis.value === 'akademik') akademik.style.display = 'block';
    if (jenis.value === 'non_akademik') nonAkademik.style.display = 'block';
}

jenis.addEventListener('change', toggle);
toggle();
</script>

<?php include "../partials/footer.php"; ?>
