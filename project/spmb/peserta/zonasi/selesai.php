<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI LOGIN ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];

/* ================= CEK STATUS ZONASI ================= */
$stmt = $pdo->prepare("
    SELECT 
        zonasi_locked,
        zonasi_final_at
    FROM peserta_biodata
    WHERE id_biodata = :id
    LIMIT 1
");
$stmt->execute(['id' => $id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

/* ================= VALIDASI ================= */
if (!$data || (int)$data['zonasi_locked'] !== 1) {
    header("Location: step6_finalisasi.php");
    exit;
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Zonasi Selesai</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card shadow-sm">
    <div class="card-body text-center p-5">

        <div class="mb-4">
            <span class="display-4 text-success">✅</span>
        </div>

        <h3 class="fw-bold mb-3">Zonasi Berhasil Difinalisasi</h3>

        <p class="text-muted mb-4">
            Data zonasi Anda telah <strong>dikunci secara permanen</strong>
            dan tidak dapat diubah kembali.
        </p>

        <div class="alert alert-success d-inline-block">
            Waktu Finalisasi:<br>
            <strong>
                <?= date('d F Y H:i', strtotime($data['zonasi_final_at'])) ?> WIB
            </strong>
        </div>

        <div class="mt-4">
            <a href="../dashboard.php" class="btn btn-primary btn-lg">
                ⬅ Kembali ke Dashboard
            </a>
        </div>

    </div>
</div>
</div>

</body>
</html>
