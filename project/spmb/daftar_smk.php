<?php
require_once "config/database.php";

$sql = "
    SELECT 
        smk.id_smk,
        smk.nama_smk,
        smk.kabupaten,
        smk.akreditasi,
        COUNT(jurusan2.id_jurusan) AS total_jurusan
    FROM smk
    LEFT JOIN jurusan2 
        ON smk.id_smk = jurusan2.id_smk 
        AND jurusan2.is_active = 1
    WHERE smk.is_active = 1
    GROUP BY smk.id_smk
    ORDER BY smk.nama_smk ASC
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dataSmk = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar SMK – SPMB SMK Sumatera Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    
</head>
<body>

<?php include "partials/navbar.php"; ?>

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Daftar SMK</h1>
        <p>SMK Negeri dan Swasta di Provinsi Sumatera Barat</p>
    </div>
</section>

<!-- CONTENT -->
<section class="section">
    <div class="container">

        <?php if (count($dataSmk) === 0): ?>
            <div class="empty-data">
                Data SMK belum tersedia.
            </div>
        <?php else: ?>
            <div class="smk-grid">
                <?php foreach ($dataSmk as $smk): ?>
                    <div class="smk-card">
                        <div>
                            <h3><?= htmlspecialchars($smk['nama_smk']) ?></h3>
                            <p><strong>Kabupaten/Kota:</strong> <?= htmlspecialchars($smk['kabupaten']) ?></p>
                            <p><strong>Jumlah Jurusan:</strong> <?= $smk['total_jurusan'] ?></p>
                            <span class="badge badge-akreditasi">
                                Akreditasi <?= $smk['akreditasi'] ?>
                            </span>
                        </div>

                        <div class="card-actions">
                            <a href="detail_smk.php?id_smk=<?= $smk['id_smk'] ?>" class="btn-detail">
                                Detail
                            </a>
                            <a href="peta_smk.php?id_smk=<?= $smk['id_smk'] ?>" class="btn-peta">
                                Peta
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include "partials/footer.php"; ?>

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

    a {
        transition: all 0.3s ease;
    }

    /* ===== ANIMASI ===== */
    @keyframes fadeUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-6px); }
        60% { transform: translateY(-3px); }
    }

    /* ===== HEADER ===== */
    .page-header {
        background: linear-gradient(135deg, #6c5ce7, #00b894);
        color: #fff;
        padding: 60px 20px;
        animation: fadeUp 1s ease forwards;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
    }

    .page-header .container {
        max-width: 1140px;
        margin: auto;
    }

    .page-header h1 {
        margin: 0 0 10px;
        font-size: 36px;
        font-weight: 800;
        text-shadow: 1px 1px 8px rgba(0,0,0,0.2);
    }

    .page-header p {
        margin: 0;
        font-size: 18px;
        opacity: 0.9;
    }

    /* ===== SECTION ===== */
    .section {
        padding: 60px 20px;
    }

    .container {
        max-width: 1140px;
        margin: auto;
    }

    /* ===== GRID CARD ===== */
    .smk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .smk-card {
        background: #fff;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.06);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 1s ease forwards;
    }

    .smk-card:nth-child(1) { animation-delay: 0.2s; }
    .smk-card:nth-child(2) { animation-delay: 0.4s; }
    .smk-card:nth-child(3) { animation-delay: 0.6s; }
    .smk-card:nth-child(4) { animation-delay: 0.8s; }
    .smk-card:nth-child(5) { animation-delay: 1s; }

    .smk-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.12);
    }

    .smk-card h3 {
        margin-top: 0;
        font-size: 22px;
        color: #6c5ce7;
        margin-bottom: 10px;
    }

    .smk-card p {
        font-size: 14px;
        color: #555;
        margin: 6px 0;
    }

    .badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 8px;
        background: #00b894;
        color: #fff;
        transition: all 0.3s ease;
    }

    /* ===== CARD ACTIONS ===== */
    .card-actions {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .card-actions a {
        flex: 1;
        text-align: center;
        padding: 12px 0;
        border-radius: 50px;
        font-size: 14px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        animation: bounce 2s infinite;
    }

    .btn-detail {
        background: #6c5ce7;
        color: #fff;
    }

    .btn-detail:hover {
        background: #5a4bd7;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        animation: none;
    }

    .btn-peta {
        background: #00b894;
        color: #fff;
    }

    .btn-peta:hover {
        background: #009e7f;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        animation: none;
    }

    /* ===== EMPTY DATA ===== */
    .empty-data {
        text-align: center;
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        color: #777;
        box-shadow: 0 12px 28px rgba(0,0,0,0.05);
        animation: fadeUp 1s ease forwards;
    }

    /* ===== RESPONSIVE ===== */
    @media(max-width: 768px) {
        .smk-grid {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 28px;
        }
    }

    @media(max-width: 480px) {
        .smk-card h3 {
            font-size: 20px;
        }

        .smk-card p, .card-actions a {
            font-size: 13px;
        }
    }
</style>
