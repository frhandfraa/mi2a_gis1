<?php
require_once "config/database.php";

$id_smk = $_GET['id_smk'] ?? null;
if (!$id_smk || !is_numeric($id_smk)) {
    die("ID SMK tidak valid");
}

$sqlSmk = "SELECT * FROM smk WHERE id_smk = :id AND is_active = 1";
$stmt = $pdo->prepare($sqlSmk);
$stmt->bindParam(":id", $id_smk, PDO::PARAM_INT);
$stmt->execute();
$smk = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$smk) {
    die("Data SMK tidak ditemukan");
}

$sqlJurusan2 = "SELECT 
    j.nama_jurusan,
    b.nama_bidang AS bidang_keahlian
        FROM jurusan2 j
        LEFT JOIN bidang_keahlian b
        ON j.id_jurusan = b.id_jurusan
        WHERE j.id_smk = :id
    AND j.is_active = 1";

$stmtJ = $pdo->prepare($sqlJurusan2);
$stmtJ->bindParam(":id", $id_smk, PDO::PARAM_INT);
$stmtJ->execute();
$jurusan = $stmtJ->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once "partials/header.php"; ?>
<?php require_once "partials/navbar.php"; ?>

<div class="container">

    <h2><?= htmlspecialchars($smk['nama_smk']); ?></h2>

    <p><strong>Kabupaten/Kota:</strong> <?= htmlspecialchars($smk['kabupaten']); ?></p>
    <p><strong>Alamat:</strong> <?= htmlspecialchars($smk['alamat']); ?></p>
    <p><strong>Akreditasi:</strong> <?= htmlspecialchars($smk['akreditasi']); ?></p>

    <hr>

    <h3>Program Keahlian</h3>

    <?php if (count($jurusan) === 0): ?>
        <p>Belum ada data jurusan.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Bidang Keahlian</th>
                    <th>Kuota</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($jurusan as $j): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($j['nama_jurusan']); ?></td>
                    <td><?= htmlspecialchars($j['bidang_keahlian']); ?></td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <hr>

    <h3>Lokasi Sekolah</h3>
    <div id="map" style="height:350px"></div>

    <p style="margin-top:15px">
        <a class="btn" href="daftar_smk.php">Kembali ke Daftar SMK</a>
    </p>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
const map = L.map('map').setView(
    [<?= $smk['latitude']; ?>, <?= $smk['longitude']; ?>],
    15
);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
L.marker([<?= $smk['latitude']; ?>, <?= $smk['longitude']; ?>])
    .addTo(map)
    .bindPopup("<?= htmlspecialchars($smk['nama_smk']); ?>")
    .openPopup();
</script>

<?php require_once "partials/footer.php"; ?>
