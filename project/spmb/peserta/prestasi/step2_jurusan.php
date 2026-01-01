<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI LOGIN ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

/* ================= AMBIL DATA SEKOLAH ================= */
$stmt = $pdo->query("
    SELECT id_smk, nama_smk 
    FROM smk 
    ORDER BY nama_smk
");
$sekolahList = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* ================= SIMPAN PILIHAN ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        empty($_POST['sekolah1']) ||
        empty($_POST['jurusan1'])
    ) {
        // jangan simpan session kalau belum lengkap
        header("Location: step2_jurusan.php?error=jurusan");
        exit;
    }

    $_SESSION['prestasi']['pilihan_jurusan'] = [
        'pilihan1' => [
            'sekolah' => $_POST['sekolah1'],
            'jurusan' => $_POST['jurusan1']
        ],
        'pilihan2' => [
            'sekolah' => $_POST['sekolah2'] ?? null,
            'jurusan' => $_POST['jurusan2'] ?? null
        ]
    ];

    header("Location: step3_ukurjarak.php");
    exit;
}


?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
    <h4 class="fw-bold mb-4">2️⃣ Pilihan Sekolah & Jurusan (Zonasi)</h4>

    <?php if(isset($_GET['error'])): ?>
<div class="alert alert-danger">
    Jurusan wajib dipilih untuk Pilihan 1
</div>
<?php endif; ?>


    <form method="POST">

        <!-- Hidden nama sekolah -->
        <input type="hidden" name="nama_sekolah1" id="nama_sekolah1">
        <input type="hidden" name="nama_sekolah2" id="nama_sekolah2">

        <!-- ================= PILIHAN 1 ================= -->
        <div class="card p-3 mb-3">
            <h6 class="fw-bold">Pilihan 1 (Wajib)</h6>

            <select name="sekolah1" id="sekolah1" class="form-select mb-2" required>
                <option value="">-- Pilih Sekolah --</option>
                <?php foreach ($sekolahList as $s): ?>
                    <option
                        value="<?= $s['id_smk'] ?>"
                        data-nama="<?= htmlspecialchars($s['nama_smk']) ?>"
                    >
                        <?= htmlspecialchars($s['nama_smk']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="jurusan1" id="jurusan1" class="form-select" required>
                <option value="">-- Pilih Jurusan --</option>
            </select>
        </div>

        <!-- ================= PILIHAN 2 ================= -->
        <div class="card p-3 mb-3">
            <h6 class="fw-bold">Pilihan 2 (Opsional)</h6>

            <select name="sekolah2" id="sekolah2" class="form-select mb-2">
                <option value="">-- Tidak Memilih --</option>
                <?php foreach ($sekolahList as $s): ?>
                    <option
                        value="<?= $s['id_smk'] ?>"
                        data-nama="<?= htmlspecialchars($s['nama_smk']) ?>"
                    >
                        <?= htmlspecialchars($s['nama_smk']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="jurusan2" id="jurusan2" class="form-select">
                <option value="">-- Pilih Jurusan --</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="step1_sekolah.php" class="btn btn-outline-secondary">⬅ Kembali</a>
            <button type="submit" class="btn btn-primary">
                Simpan & Lanjut ➜
            </button>
        </div>

    </form>
</div>

<?php include "../partials/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function loadJurusan(id, target){
    if(!id){
        $(target).html('<option value="">-- Pilih Jurusan --</option>');
        return;
    }

    $.getJSON("get_jurusan.php", {id_smk: id}, function(res){
        let opt = '<option value="">-- Pilih Jurusan --</option>';
        res.forEach(j => {
            opt += `<option value="${j.nama_jurusan}">${j.nama_jurusan}</option>`;
        });
        $(target).html(opt);
    });
}

// Pilihan 1
$('#sekolah1').on('change', function(){
    const nama = $(this).find(':selected').data('nama') || '';
    $('#nama_sekolah1').val(nama);
    loadJurusan(this.value, '#jurusan1');
});

// Pilihan 2
$('#sekolah2').on('change', function(){
    const nama = $(this).find(':selected').data('nama') || '';
    $('#nama_sekolah2').val(nama);
    loadJurusan(this.value, '#jurusan2');
});
</script>
