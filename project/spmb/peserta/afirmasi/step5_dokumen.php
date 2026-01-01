<?php
session_start();
require_once "../../config/database.php";

// Pastikan step sebelumnya sudah diisi
if (!isset($_SESSION['afirmasi']['jenis'])) {
    header("Location: step2_jenis.php");
    exit;
}

$kategori = $_SESSION['afirmasi']['jenis'];

// Proses simpan dokumen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = "../../uploads/afirmasi/";
    $dokumenFiles = ['kk','ktp_wali','persetujuan','foto'];

    // Tambahkan dokumen khusus berdasarkan kategori
    switch($kategori){
        case 'tidak_mampu':
            $dokumenFiles = array_merge($dokumenFiles, ['kip','sktm']);
            break;
        case 'panti':
            $dokumenFiles = array_merge($dokumenFiles, ['surat_panti','rekom_dinsos']);
            break;
        case 'yatim':
            $dokumenFiles = array_merge($dokumenFiles, ['akta_kematian','kk_khusus']);
            break;
        case '3t':
            $dokumenFiles = array_merge($dokumenFiles, ['surat_domisili','rekom_desa','kk_khusus']);
            break;
    }

    foreach($dokumenFiles as $fileKey){
        if(isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error']==0){
            $tmpName = $_FILES[$fileKey]['tmp_name'];
            $fileName = time().'_'.$fileKey.'_'.basename($_FILES[$fileKey]['name']);
            move_uploaded_file($tmpName, $uploadDir.$fileName);
            $_SESSION['afirmasi']['dokumen'][$fileKey] = $fileName;
        }
    }

    header("Location: step6_finalisasi.php");
    exit;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4>6️⃣ Upload Dokumen Pendukung</h4>

<form method="post" enctype="multipart/form-data" class="form-box">

    <h5>Dokumen Umum</h5>
    <div class="mb-3">
        <label>Kartu Keluarga (KK)</label>
        <input type="file" name="kk" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="mb-3">
        <label>KTP/Wali (Jika Wali Sah)</label>
        <input type="file" name="ktp_wali" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
    </div>

    <div class="mb-3">
        <label>Pernyataan Keabsahan Data / Persetujuan</label>
        <input type="file" name="persetujuan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="mb-3">
        <label>Foto Peserta / Pas Foto (Opsional)</label>
        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png">
    </div>

    <h5>Dokumen Khusus</h5>

    <?php if($kategori=='tidak_mampu'): ?>
        <div class="mb-3">
            <label>KIP / PKH / KKS</label>
            <input type="file" name="kip" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
        <div class="mb-3">
            <label>Surat Keterangan Tidak Mampu (SKTM)</label>
            <input type="file" name="sktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
    <?php elseif($kategori=='panti'): ?>
        <div class="mb-3">
            <label>Surat Keterangan dari Panti / Yayasan</label>
            <input type="file" name="surat_panti" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
        <div class="mb-3">
            <label>Surat Rekomendasi Dinas Sosial (Opsional)</label>
            <input type="file" name="rekom_dinsos" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
    <?php elseif($kategori=='yatim'): ?>
        <div class="mb-3">
            <label>Akta Kematian Orang Tua</label>
            <input type="file" name="akta_kematian" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
        <div class="mb-3">
            <label>Kartu Keluarga (Khusus)</label>
            <input type="file" name="kk_khusus" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
    <?php elseif($kategori=='3t'): ?>
        <div class="mb-3">
            <label>Surat Keterangan Domisili</label>
            <input type="file" name="surat_domisili" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
        <div class="mb-3">
            <label>Surat Rekomendasi Desa/Kelurahan</label>
            <input type="file" name="rekom_desa" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
        <div class="mb-3">
            <label>Kartu Keluarga (Khusus)</label>
            <input type="file" name="kk_khusus" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mt-4">
        <a href="step4_nilai.php" class="btn btn-outline-secondary">⬅ Kembali</a>
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
.form-control{
    border-radius:12px;
    margin-bottom:16px;
}
.btn{
    border-radius:12px;
    font-weight:600;
}
</style>
