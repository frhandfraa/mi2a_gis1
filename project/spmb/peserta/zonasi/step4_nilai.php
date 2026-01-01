<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI STEP ================= */
if (
    !isset($_SESSION['user_id']) ||
    !isset($_SESSION['zonasi']['pilihan_jurusan']) ||
    !isset($_SESSION['zonasi']['jarak']['jarak1'])
) {
    header("Location: step3_ukurjarak.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* ================= DATA SESSION ================= */
$nilaiSession = $_SESSION['zonasi']['nilai'] ?? [];

$rapor = $nilaiSession['rapor'] ?? [];
$ijazah = $nilaiSession['ijazah'] ?? [
    'no_ijazah' => '',
    'tgl_ijazah' => '',
    'nilai' => 0
];

/* ================= PROSES SIMPAN ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $rapor = [];
    $rataPerSemester = [];

    for ($s = 1; $s <= 5; $s++) {

        $rapor["sem$s"] = [
            'matematika' => $_POST["matematika_s$s"] ?? 0,
            'bindo'      => $_POST["bindo_s$s"] ?? 0,
            'bing'       => $_POST["bing_s$s"] ?? 0,
            'ipa'        => $_POST["ipa_s$s"] ?? 0,
            'ips'        => $_POST["ips_s$s"] ?? 0
        ];

        $sum = 0; $count = 0;
        foreach ($rapor["sem$s"] as $n) {
            if ($n !== '') {
                $sum += (float)$n;
                $count++;
            }
        }

        $rataPerSemester["sem$s"] = $count > 0 ? round($sum / $count, 2) : 0;
    }

    $rataTotal = count($rataPerSemester)
        ? round(array_sum($rataPerSemester) / count($rataPerSemester), 2)
        : 0;

    $ijazah = [
        'no_ijazah' => $_POST['no_ijazah'] ?? '',
        'tgl_ijazah'=> $_POST['tgl_ijazah'] ?? '',
        'nilai'     => $_POST['nilai_ijazah'] ?? 0
    ];

    $_SESSION['zonasi']['nilai'] = [
        'rapor' => $rapor,
        'rata_per_semester' => $rataPerSemester,
        'rata_total_rapor' => $rataTotal,
        'ijazah' => $ijazah
    ];

    header("Location: step5_dokumen.php");
    exit;
}

/* ================= HELPER ================= */
function rataSemester($sem) {
    $total = 0; $count = 0;
    foreach ($sem as $n) {
        if ($n !== '') { $total += (float)$n; $count++; }
    }
    return $count > 0 ? round($total / $count, 2) : 0;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4 class="fw-bold mb-3">4️⃣ Input Nilai Rapor & Ijazah (Zonasi)</h4>

<form method="post">

<?php for ($s=1; $s<=5; $s++):
$sem = $rapor["sem$s"] ?? ['matematika'=>0,'bindo'=>0,'bing'=>0,'ipa'=>0,'ips'=>0];
?>
<div class="card mb-3 p-3">
    <h5>Semester <?= $s ?></h5>
    <div class="row g-3">
        <div class="col-md-2">
            <label>Matematika</label>
            <input type="number" step="0.01" name="matematika_s<?= $s ?>" class="form-control nilai-sem" value="<?= $sem['matematika'] ?>">
        </div>
        <div class="col-md-2">
            <label>B. Indonesia</label>
            <input type="number" step="0.01" name="bindo_s<?= $s ?>" class="form-control nilai-sem" value="<?= $sem['bindo'] ?>">
        </div>
        <div class="col-md-2">
            <label>B. Inggris</label>
            <input type="number" step="0.01" name="bing_s<?= $s ?>" class="form-control nilai-sem" value="<?= $sem['bing'] ?>">
        </div>
        <div class="col-md-2">
            <label>IPA</label>
            <input type="number" step="0.01" name="ipa_s<?= $s ?>" class="form-control nilai-sem" value="<?= $sem['ipa'] ?>">
        </div>
        <div class="col-md-2">
            <label>IPS</label>
            <input type="number" step="0.01" name="ips_s<?= $s ?>" class="form-control nilai-sem" value="<?= $sem['ips'] ?>">
        </div>
        <div class="col-md-2">
            <label>Rata-rata</label>
            <input type="number" step="0.01" class="form-control rata-sem" value="<?= rataSemester($sem) ?>" readonly>
        </div>
    </div>
</div>
<?php endfor; ?>

<div class="card p-3 mb-3">
    <h5>Nilai Ijazah</h5>
    <div class="row g-3">
        <div class="col-md-4">
            <label>Nomor Ijazah</label>
            <input type="text" name="no_ijazah" class="form-control" value="<?= htmlspecialchars($ijazah['no_ijazah']) ?>">
        </div>
        <div class="col-md-4">
            <label>Tanggal Terbit</label>
            <input type="date" name="tgl_ijazah" class="form-control" value="<?= htmlspecialchars($ijazah['tgl_ijazah']) ?>">
        </div>
        <div class="col-md-4">
            <label>Nilai Ijazah</label>
            <input type="number" step="0.01" name="nilai_ijazah" class="form-control" value="<?= $ijazah['nilai'] ?>">
        </div>
    </div>
</div>

<div class="card p-3 mb-3">
    <h5>Total Rata-rata Rapor</h5>
    <input type="number" id="totalRata" step="0.01" class="form-control" value="<?= $nilaiSession['rata_total_rapor'] ?? 0 ?>" readonly>
</div>

<div class="d-flex justify-content-between mt-3">
    <a href="step3_ukurjarak.php" class="btn btn-outline-secondary">⬅ Kembali</a>
    <button class="btn btn-primary px-4">Simpan & Lanjut ➜</button>
</div>

</form>
</div>

<?php include "../partials/footer.php"; ?>

<script src="../../assets/jquery.min.js"></script>
<script>
$(function(){
    function hitung(){
        let total = 0, count = 0;
        $('.card').each(function(){
            let sum = 0, c = 0;
            $(this).find('.nilai-sem').each(function(){
                let v = parseFloat($(this).val());
                if(!isNaN(v)){ sum += v; c++; }
            });
            if(c > 0){
                let rata = (sum/c).toFixed(2);
                $(this).find('.rata-sem').val(rata);
                total += parseFloat(rata);
                count++;
            }
        });
        $('#totalRata').val(count ? (total/count).toFixed(2) : 0);
    }

    $('.nilai-sem').on('input', hitung);
});
</script>

<style>
.form-control { border-radius:12px; }
.btn { border-radius:12px; font-weight:600; }
</style>
