<?php
session_start();
require_once "../../config/database.php";

/* Pastikan step1 sudah diisi */
if (!isset($_SESSION['zonasi']['sekolah'])) {
    header("Location: step1_sekolah.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* Ambil list sekolah dari DB */
$stmt = $pdo->query("SELECT id_smk, nama_smk FROM smk ORDER BY nama_smk");
$sekolahList = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* Simpan pilihan jurusan */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['zonasi']['pilihan_jurusan'] = [
        'pilihan1' => [
            'sekolah' => $_POST['sekolah1'],
            'jurusan' => $_POST['jurusan1']
        ],
        'pilihan2' => [
            'sekolah' => $_POST['sekolah2'],
            'jurusan' => $_POST['jurusan2']
        ]
    ];
    header("Location: step3_ukurjarak.php");
    exit;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">

<h4 class="mb-4">2️⃣ Pilihan Sekolah & Jurusan</h4>

<form method="POST">

    <!-- PILIHAN 1 -->
    <div class="mb-3">
        <label>Pilihan 1 - Sekolah</label>
        <select name="sekolah1" id="sekolah1" class="form-select" required>
            <option value="">-- Pilih Sekolah --</option>
            <?php foreach($sekolahList as $s): ?>
                <option value="<?= $s['id_smk'] ?>"><?= $s['nama_smk'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pilihan 1 - Jurusan</label>
        <select name="jurusan1" id="jurusan1" class="form-select" required>
            <option value="">-- Pilih Jurusan --</option>
        </select>
    </div>

    <!-- PILIHAN 2 -->
    <div class="mb-3">
        <label>Pilihan 2 - Sekolah</label>
        <select name="sekolah2" id="sekolah2" class="form-select">
            <option value="">-- Pilih Sekolah --</option>
            <?php foreach($sekolahList as $s): ?>
                <option value="<?= $s['id_smk'] ?>"><?= $s['nama_smk'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Pilihan 2 - Jurusan</label>
        <select name="jurusan2" id="jurusan2" class="form-select">
            <option value="">-- Pilih Jurusan --</option>
        </select>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="step1_sekolah.php" class="btn btn-outline-secondary">⬅ Kembali</a>
        <button class="btn btn-primary px-4">Simpan & Lanjut ➜</button>
    </div>

</form>
</div>

<?php include "../partials/footer.php"; ?>

<!-- AJAX load jurusan -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){

    function loadJurusan(sekolahId, jurusanSelectId){
        if(sekolahId){
            $.ajax({
                url: "get_jurusan.php",
                method: "GET",
                data: {id_smk: sekolahId},
                dataType: "json",
                success: function(data){
                    let html = '<option value="">-- Pilih Jurusan --</option>';
                    data.forEach(function(j){
                        html += '<option value="'+j.nama_jurusan+'">'+j.nama_jurusan+'</option>';
                    });
                    $(jurusanSelectId).html(html);
                },
                error: function(xhr, status, error){
                    console.error("AJAX Error:", status, error);
                }
            });
        } else {
            $(jurusanSelectId).html('<option value="">-- Pilih Jurusan --</option>');
        }
    }

    $('#sekolah1').change(function(){
        loadJurusan($(this).val(), '#jurusan1');
    });
    $('#sekolah2').change(function(){
        loadJurusan($(this).val(), '#jurusan2');
    });

});
</script>
