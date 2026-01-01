<?php
session_start();
require_once "../../config/database.php";

/* ================== AUTH ================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
$id_user = $_SESSION['user_id'];

/* ================== VALIDASI STEP 2 ================== */
if (!isset($_SESSION['reguler']['pilihan_jurusan'])) {
    header("Location: step2_jurusan.php");
    exit;
}

/* ================== PROSES SIMPAN JARAK ================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jarak1 = $_POST['jarak1'] ?? null;
    $jarak2 = $_POST['jarak2'] ?? null;

    // Simpan ke database
    $stmt = $pdo->prepare("
        UPDATE peserta_biodata
        SET jarak_pilihan1 = ?, jarak_pilihan2 = ?
        WHERE id_user = ?
    ");
    $stmt->execute([$jarak1, $jarak2, $id_user]);

    // Simpan ke session (opsional, untuk navigasi)
    $_SESSION['reguler']['jarak'] = [
        'jarak1' => $jarak1,
        'jarak2' => $jarak2
    ];

    header("Location: step4_nilai.php");
    exit;
}

/* ================== DATA PILIHAN SEKOLAH ================== */
$pilihan1 = $_SESSION['reguler']['pilihan_jurusan']['pilihan1'] ?? null;
$pilihan2 = $_SESSION['reguler']['pilihan_jurusan']['pilihan2'] ?? null;

/* ================== AMBIL DATA SEKOLAH ================== */
$stmt1 = $pdo->prepare("SELECT nama_smk, latitude, longitude FROM smk WHERE id_smk = ?");
$stmt1->execute([$pilihan1['sekolah']]);
$sk1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$sk2 = null;
if ($pilihan2 && $pilihan2['sekolah']) {
    $stmt2 = $pdo->prepare("SELECT nama_smk, latitude, longitude FROM smk WHERE id_smk = ?");
    $stmt2->execute([$pilihan2['sekolah']]);
    $sk2 = $stmt2->fetch(PDO::FETCH_ASSOC);
}
?>

<?php include "../partials/header.php"; ?>
<?php include "../partials/navbar.php"; ?>

<div class="container my-4" style="display:flex; gap:20px; flex-wrap:wrap; align-items:flex-start;">

    <!-- SIDEBAR -->
    <div style="width:250px;">
        <h5>Petunjuk Rute (Jalur Reguler)</h5>

        <div id="ruteInfo" style="font-size:14px; line-height:1.4; max-height:300px; overflow-y:auto;">
            <p>Rute Sekolah 1:</p>
            <ol id="rute1List"></ol>

            <?php if($sk2): ?>
            <p>Rute Sekolah 2:</p>
            <ol id="rute2List"></ol>
            <?php endif; ?>
        </div>

        <div class="mt-3">
            <p id="jarakDisplay1">Jarak Sekolah 1+: - km</p>
            <?php if($sk2): ?>
            <p id="jarakDisplay2">Jarak Sekolah 2+: - km</p>
            <?php endif; ?>
        </div>

        <div class="mt-3 d-flex flex-column gap-2">
            <a href="step2_jurusan.php" class="btn btn-outline-secondary">⬅ Kembali</a>

            <!-- 🔑 ACTION HARUS KE FILE INI -->
            <form method="POST" action="">
                <input type="hidden" name="jarak1" id="jarak1">
                <input type="hidden" name="jarak2" id="jarak2">
                <button class="btn btn-primary">Simpan & Lanjut ➜</button>
            </form>
        </div>
    </div>

    <!-- MAP -->
    <div id="map" style="flex:1; min-height:400px; border-radius:12px;"></div>
</div>

<?php include "../partials/footer.php"; ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 });
    let topo = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', { maxZoom: 17 });

    let map = L.map('map', { layers:[osm] }).setView([-0.94708, 100.41718], 12);
    L.control.layers({ "OSM": osm, "Topografi": topo }).addTo(map);

    let rumahMarker, sekolah1Marker, sekolah2Marker;
    let r1, r2;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(pos => {
            rumahMarker = L.marker([pos.coords.latitude, pos.coords.longitude], {draggable:true})
                .addTo(map).bindPopup("Rumah Anda").openPopup();
            map.setView(rumahMarker.getLatLng(), 13);
            rumahMarker.on('dragend', hitungRute);
            hitungRute();
        });
    }

    map.on('click', e => {
        if(rumahMarker) map.removeLayer(rumahMarker);
        rumahMarker = L.marker(e.latlng, {draggable:true}).addTo(map);
        rumahMarker.on('dragend', hitungRute);
        hitungRute();
    });

    function hitungRute(){
        if(!rumahMarker) return;

        if(sekolah1Marker) map.removeLayer(sekolah1Marker);
        sekolah1Marker = L.marker([<?= $sk1['latitude'] ?>, <?= $sk1['longitude'] ?>])
            .addTo(map).bindPopup("<?= $sk1['nama_smk'] ?>");

        if(r1) r1.remove();
        r1 = L.Routing.control({
            waypoints:[rumahMarker.getLatLng(), sekolah1Marker.getLatLng()],
            show:false,
            createMarker:()=>null
        }).addTo(map);

        r1.on('routesfound', e=>{
            let d = e.routes[0].summary.totalDistance / 1000;
            jarak1.value = d.toFixed(2);
            jarakDisplay1.innerText = "Jarak Sekolah 1+: "+d.toFixed(2)+" km";
        });

        <?php if($sk2): ?>
        if(sekolah2Marker) map.removeLayer(sekolah2Marker);
        sekolah2Marker = L.marker([<?= $sk2['latitude'] ?>, <?= $sk2['longitude'] ?>])
            .addTo(map).bindPopup("<?= $sk2['nama_smk'] ?>");

        if(r2) r2.remove();
        r2 = L.Routing.control({
            waypoints:[rumahMarker.getLatLng(), sekolah2Marker.getLatLng()],
            show:false,
            createMarker:()=>null
        }).addTo(map);

        r2.on('routesfound', e=>{
            let d = e.routes[0].summary.totalDistance / 1000;
            jarak2.value = d.toFixed(2);
            jarakDisplay2.innerText = "Jarak Sekolah 2+: "+d.toFixed(2)+" km";
        });
        <?php endif; ?>
    }

    setTimeout(()=>map.invalidateSize(),200);
});
</script>

<style>
#map{width:100%;height:400px;border-radius:12px;}
</style>
