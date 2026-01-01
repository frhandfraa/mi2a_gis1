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

    <div class="card-detail">
        <h2><?= htmlspecialchars($smk['nama_smk']); ?></h2>
        <p><strong>Kabupaten/Kota:</strong> <?= htmlspecialchars($smk['kabupaten']); ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($smk['alamat']); ?></p>
        <p>
            <strong>Akreditasi:</strong> 
            <span class="badge-akreditasi"><?= htmlspecialchars($smk['akreditasi']); ?></span>
        </p>

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
                        <td>-</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <hr>

        <h3>Lokasi Sekolah</h3>
        <div id="map"></div>

        <p style="margin-top:15px">
            <a class="btn" href="daftar_smk.php">Kembali ke Daftar SMK</a>
        </p>
    </div>

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

<style>
/* ===== GLOBAL ===== */
body {
    background: #f0f4f8;
    color: #333;
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
    scroll-behavior: smooth;
}

.container {
    max-width: 1140px;
    margin: 40px auto;
    padding: 0 20px;
}

/* ===== ANIMASI ===== */
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ===== CARD DETAIL ===== */
.card-detail {
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.06);
    animation: fadeUp 0.8s ease forwards;
}

/* ===== JUDUL & PARAGRAF ===== */
h2, h3 {
    color: #6c5ce7;
    margin-bottom: 15px;
}

h2 { font-size: 28px; }
h3 { font-size: 22px; }

p {
    font-size: 15px;
    color: #555;
    margin-bottom: 10px;
}

/* ===== BADGE ===== */
.badge-akreditasi {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    margin-top: 8px;
    background: #00b894;
    color: #fff;
}

/* ===== TABLE ===== */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    animation: fadeUp 1s ease forwards;
}

table thead tr {
    background: #6c5ce7;
    color: #fff;
    text-align: left;
}

table th, table td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

table tbody tr:nth-child(even) {
    background: #f7f9fc;
}

table tbody tr:hover {
    background: #e0e4ff;
    transition: background 0.3s ease;
}

/* ===== BUTTON ===== */
.btn {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 50px;
    background: #6c5ce7;
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    animation: fadeUp 1s ease forwards;
}

.btn:hover {
    background: #5a4bd7;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* ===== MAP ===== */
#map {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    height: 350px;
    animation: fadeUp 1s ease forwards;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    h2 { font-size: 26px; }
    h3 { font-size: 20px; }
    table th, table td { padding: 10px; }
}

@media(max-width: 480px) {
    h2 { font-size: 24px; }
    h3 { font-size: 18px; }
    p { font-size: 14px; }
    .btn { padding: 10px 20px; font-size: 14px; }
}
</style>
