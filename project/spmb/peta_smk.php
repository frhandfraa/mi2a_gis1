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

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #198754);
            color: #fff;
            padding: 45px 20px;
        }

        .page-header .container {
            max-width: 1140px;
            margin: auto;
        }

        .page-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
        }

        .page-header p {
            margin-top: 8px;
            opacity: 0.95;
        }

        .section {
            padding: 40px 20px;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        #map {
            width: 100%;
            height: 600px;
            background: #eaeaea;
            border-radius: 12px;
        }

        .map-note {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        .empty-data {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            color: #777;
        }
    </style>
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
