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
            padding: 50px 20px;
        }

        .page-header .container {
            max-width: 1140px;
            margin: auto;
        }

        .page-header h1 {
            margin: 0 0 10px;
            font-size: 32px;
            font-weight: 700;
        }

        .page-header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.95;
        }

        .section {
            padding: 50px 20px;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        .smk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .smk-card {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .smk-card h3 {
            margin-top: 0;
            font-size: 20px;
            color: #0d6efd;
        }

        .smk-card p {
            font-size: 14px;
            color: #555;
            margin: 6px 0;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .badge-akreditasi {
            background: #198754;
            color: #fff;
        }

        .card-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .card-actions a {
            flex: 1;
            text-align: center;
            padding: 10px 0;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-detail {
            background: #0d6efd;
            color: #fff;
        }

        .btn-detail:hover {
            background: #0b5ed7;
        }

        .btn-peta {
            background: #198754;
            color: #fff;
        }

        .btn-peta:hover {
            background: #157347;
        }

        .empty-data {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            color: #777;
        }
    </style>
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
