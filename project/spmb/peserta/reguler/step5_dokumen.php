<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI ALUR REGULER ================= */
if (
    !isset($_SESSION['user_id']) ||
    !isset($_SESSION['reguler']['nilai'])
) {
    header("Location: step4_nilai.php");
    exit;
}

/* ================= PROSES UPLOAD ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $uploadDir = "../../uploads/reguler/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $dokumenFiles = [
        'kk',
        'ktp_wali',
        'persetujuan',
        'foto',
        'raport',
        'ijazah',
        'surat_domisili'
    ];

    foreach ($dokumenFiles as $fileKey) {
        if (!empty($_FILES[$fileKey]['name']) && $_FILES[$fileKey]['error'] === 0) {

            $tmpName = $_FILES[$fileKey]['tmp_name'];
            $ext     = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));

            $allowed = ['pdf','jpg','jpeg','png'];
            if (!in_array($ext, $allowed)) {
                continue;
            }

            $fileName = time() . '_' . $fileKey . '_' . $_SESSION['user_id'] . '.' . $ext;
            move_uploaded_file($tmpName, $uploadDir . $fileName);

            $_SESSION['reguler']['dokumen'][$fileKey] = $fileName;
        }
    }

    header("Location: step6_finalisasi.php");
    exit;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4 class="fw-bold">5️⃣ Upload Dokumen Pendukung (Reguler)</h4>

<form method="post" enctype="multipart/form-data" class="form-box">

<h5>📁 Dokumen Umum</h5>

<div class="mb-3">
    <label>Kartu Keluarga (KK)</label>
    <input type="file" name="kk" class="form-control" required>
</div>

<div class="mb-3">
    <label>KTP Wali (Opsional)</label>
    <input type="file" name="ktp_wali" class="form-control">
</div>

<div class="mb-3">
    <label>Surat Persetujuan Orang Tua</label>
    <input type="file" name="persetujuan" class="form-control" required>
</div>

<div class="mb-3">
    <label>Pas Foto Peserta (Opsional)</label>
    <input type="file" name="foto" class="form-control">
</div>

<hr>

<h5>📚 Dokumen Akademik & Domisili</h5>

<div class="mb-3">
    <label>Raport</label>
    <input type="file" name="raport" class="form-control" required>
</div>

<div class="mb-3">
    <label>Ijazah / SKL</label>
    <input type="file" name="ijazah" class="form-control" required>
</div>

<div class="mb-3">
    <label>Surat Keterangan Domisili</label>
    <input type="file" name="surat_domisili" class="form-control" required>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="step4_nilair.php" class="btn btn-outline-secondary">⬅ Kembali</a>
    <button class="btn btn-primary px-4">Simpan & Lanjut ➜</button>
</div>

</form>
</div>

<?php include "../partials/footer.php"; ?>

<style>
.form-box{
    background:#fff;
    padding:28px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
.form-control{ border-radius:12px; margin-bottom:14px; }
.btn{ border-radius:12px; font-weight:600; }
</style>
