<?php
require_once "config/database.php";

/* Jika ada id_smk → tampilkan 1 SMK */
if (isset($_GET['id_smk'])) {
    $stmt = $pdo->prepare("
        SELECT id_smk, nama_smk, kabupaten, latitude, longitude
        FROM smk
        WHERE id_smk = :id AND is_active = 1
    ");
    $stmt->execute([':id' => $_GET['id_smk']]);
    $dataSmk = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    /* Jika tidak ada → tampilkan semua SMK */
    $stmt = $pdo->prepare("
        SELECT id_smk, nama_smk, kabupaten, latitude, longitude
        FROM smk
        WHERE is_active = 1
        AND latitude IS NOT NULL
        AND longitude IS NOT NULL
    ");
    $stmt->execute();
    $dataSmk = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peta SMK – SPMB SMK Sumatera Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet"
    >
</head>
<body>

<?php include "partials/navbar.php"; ?>

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Peta Lokasi SMK</h1>
        <p>Persebaran Sekolah Menengah Kejuruan di Provinsi Sumatera Barat</p>
    </div>
</section>

<!-- CONTENT -->
<section class="section">
    <div class="container">

        <?php if (count($dataSmk) === 0): ?>
            <div class="empty-data">
                Data lokasi SMK belum tersedia.
            </div>
        <?php else: ?>
            <div id="map"></div>
            <div class="map-note">
                Klik marker untuk melihat informasi SMK.
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include "partials/footer.php"; ?>

<!-- Leaflet JS (WAJIB, dan BENAR) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<?php if (count($dataSmk) > 0): ?>
<script>
    var map = L.map('map').setView([-0.7399397, 100.8000051], 8);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    <?php foreach ($dataSmk as $smk): ?>
        L.marker([<?= $smk['latitude'] ?>, <?= $smk['longitude'] ?>])
            .addTo(map)
            .bindPopup(`
                <strong><?= addslashes($smk['nama_smk']) ?></strong><br>
                <?= addslashes($smk['kabupaten']) ?><br>
                <a href="detail_smk.php?id_smk=<?= $smk['id_smk'] ?>">Lihat Detail</a>
            `);
    <?php endforeach; ?>
</script>
<?php endif; ?>

</body>
</html>

<style>
/* ===== GLOBAL ===== */
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #f0f4f8;
    color: #333;
    scroll-behavior: smooth;
}

/* ===== HEADER ===== */
.page-header {
    background: linear-gradient(135deg, #0d6efd, #198754);
    color: #fff;
    padding: 50px 20px;
    animation: fadeUp 0.8s ease forwards;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.page-header .container {
    max-width: 1140px;
    margin: auto;
}

.page-header h1 {
    margin: 0;
    font-size: 32px;
    font-weight: 700;
}

.page-header p {
    margin-top: 10px;
    opacity: 0.95;
    font-size: 16px;
}

/* ===== SECTION ===== */
.section {
    padding: 50px 20px;
}

.container {
    max-width: 1140px;
    margin: auto;
}

/* ===== MAP ===== */
#map {
    width: 100%;
    height: 400px; /* tidak sebesar halaman */
    max-width: 100%;
    background: #eaeaea;
    border-radius: 20px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    animation: fadeUp 1s ease forwards;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: auto;
}

#map:hover {
    transform: scale(1.01);
    box-shadow: 0 16px 35px rgba(0,0,0,0.12);
}

/* ===== MAP NOTE ===== */
.map-note {
    margin-top: 15px;
    font-size: 14px;
    color: #555;
    text-align: center;
}

/* ===== EMPTY DATA ===== */
.empty-data {
    background: #fff;
    padding: 40px 20px;
    border-radius: 20px;
    text-align: center;
    color: #777;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    animation: fadeUp 1s ease forwards;
}

/* ===== ANIMASI FADE UP ===== */
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    .page-header h1 { font-size: 28px; }
    #map { height: 350px; }
}

@media(max-width: 480px) {
    .page-header h1 { font-size: 24px; }
    #map { height: 280px; }
    .map-note { font-size: 13px; }
}
</style>
