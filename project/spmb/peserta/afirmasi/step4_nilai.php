<?php
session_start();
require_once "../../config/database.php";

if (!isset($_SESSION['afirmasi']['pilihan_jurusan'])) {
    header("Location: step3_jurusan.php");
    exit;
}

$id_user = $_SESSION['user_id'];
$rapor = $_SESSION['afirmasi']['rapor'] ?? [];
$ijazah = $_SESSION['afirmasi']['ijazah'] ?? ['no_ijazah'=>'','tgl_ijazah'=>'','nilai'=>0];

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $rapor = [];
    $rataPerSemester = [];

    // Simpan nilai per semester
    for($s=1;$s<=5;$s++){
        $rapor["sem$s"] = [
            'matematika'=>$_POST["matematika_s$s"]??0,
            'bindo'=>$_POST["bindo_s$s"]??0,
            'bing'=>$_POST["bing_s$s"]??0,
            'ipa'=>$_POST["ipa_s$s"]??0,
            'ips'=>$_POST["ips_s$s"]??0
        ];
        $sum = 0; $count = 0;
        foreach($rapor["sem$s"] as $n){
            if($n!==''){ $sum+=$n; $count++; }
        }
        $rataPerSemester["sem$s"] = $count>0 ? round($sum/$count,2) : 0;
    }

    // Rata-rata total rapor dari rata-rata semester
    $totalSem = count($rataPerSemester);
    $rataTotal = $totalSem>0 ? round(array_sum($rataPerSemester)/$totalSem,2) : 0;

    $ijazah = [
        'nilai'=>$_POST['nilai_ijazah']??$ijazah['nilai'], // tetap terpisah
        'no_ijazah'=>$_POST['no_ijazah']??'',
        'tgl_ijazah'=>$_POST['tgl_ijazah']??''
    ];

    $_SESSION['afirmasi']['rapor']=$rapor;
    $_SESSION['afirmasi']['rata_per_semester']=$rataPerSemester;
    $_SESSION['afirmasi']['rata_total_rapor']=$rataTotal;
    $_SESSION['afirmasi']['ijazah']=$ijazah;

    header("Location: step5_dokumen.php");
    exit;
}

function rataSemester($sem) {
    $total=0; $count=0;
    foreach($sem as $n){ if($n!==''){ $total+=$n; $count++; } }
    return $count>0 ? round($total/$count,2) : 0;
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4">
<h4>4️⃣ Input Nilai Rapor & Ijazah</h4>

<form method="post">
<?php
for($s=1;$s<=5;$s++):
    $sem = $rapor["sem$s"]??['matematika'=>0,'bindo'=>0,'bing'=>0,'ipa'=>0,'ips'=>0];
?>
<div class="card mb-3 p-3">
    <h5>Semester <?=$s?></h5>
    <div class="row g-3">
        <div class="col-md-2"><label>Mtk</label><input type="number" step="0.01" name="matematika_s<?=$s?>" class="form-control nilai-sem" value="<?=$sem['matematika']?>"></div>
        <div class="col-md-2"><label>B. Indonesia</label><input type="number" step="0.01" name="bindo_s<?=$s?>" class="form-control nilai-sem" value="<?=$sem['bindo']?>"></div>
        <div class="col-md-2"><label>B. Inggris</label><input type="number" step="0.01" name="bing_s<?=$s?>" class="form-control nilai-sem" value="<?=$sem['bing']?>"></div>
        <div class="col-md-2"><label>IPA</label><input type="number" step="0.01" name="ipa_s<?=$s?>" class="form-control nilai-sem" value="<?=$sem['ipa']?>"></div>
        <div class="col-md-2"><label>IPS</label><input type="number" step="0.01" name="ips_s<?=$s?>" class="form-control nilai-sem" value="<?=$sem['ips']?>"></div>
        <div class="col-md-2"><label>Rata-rata Sem <?=$s?></label><input type="number" step="0.01" class="form-control rata-sem" data-sem="<?=$s?>" value="<?=rataSemester($sem)?>" readonly></div>
    </div>
</div>
<?php endfor; ?>

<div class="card p-3 mb-3">
    <h5>Nilai Ijazah</h5>
    <div class="row g-3">
        <div class="col-md-4">
            <label>Nomor Ijazah</label>
            <input type="text" name="no_ijazah" class="form-control" value="<?=htmlspecialchars($ijazah['no_ijazah'])?>">
        </div>
        <div class="col-md-4">
            <label>Tanggal Terbit</label>
            <input type="date" name="tgl_ijazah" class="form-control" value="<?=htmlspecialchars($ijazah['tgl_ijazah'])?>">
        </div>
        <div class="col-md-4">
            <label>Nilai Ijazah</label>
            <input type="number" step="0.01" name="nilai_ijazah" class="form-control" value="<?=$ijazah['nilai']?>">
        </div>
    </div>
</div>

<div class="card p-3 mb-3">
    <h5>Total Rata-rata Raport</h5>
    <input type="number" step="0.01" class="form-control" value="<?=$_SESSION['afirmasi']['rata_total_rapor']??0?>" readonly>
</div>

<div class="d-flex justify-content-between mt-3">
    <a href="step3_jurusan.php" class="btn btn-outline-secondary">⬅ Kembali</a>
    <button class="btn btn-primary px-4">Simpan & Lanjut ➜</button>
</div>
</form>
</div>

<?php include "../partials/footer.php"; ?>

<script src="../../assets/jquery.min.js"></script>
<script>
$(document).ready(function(){
    function hitungRataSemester(semCard){
        let sum=0, count=0;
        semCard.find('.nilai-sem').each(function(){
            let val=parseFloat($(this).val());
            if(!isNaN(val)){ sum+=val; count++; }
        });
        let rata = count>0 ? (sum/count).toFixed(2) : 0;
        semCard.find('.rata-sem').val(rata);
        return parseFloat(rata);
    }

    function hitungRataTotal(){
        let totalSum=0, totalCount=0;
        $('.rata-sem').each(function(){
            let val=parseFloat($(this).val());
            if(!isNaN(val)){ totalSum+=val; totalCount++; }
        });
        let totalRata = totalCount>0 ? (totalSum/totalCount).toFixed(2) : 0;
        $('#totalRataRapor').val(totalRata);
    }

    $('.nilai-sem').on('input', function(){
        let semCard = $(this).closest('.card');
        hitungRataSemester(semCard);
        hitungRataTotal();
    });
});

</script>

<style>
.form-control { border-radius:12px; margin-bottom:10px; }
.btn { border-radius:12px; font-weight:600; }
</style>
