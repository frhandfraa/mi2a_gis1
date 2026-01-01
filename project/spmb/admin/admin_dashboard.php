<?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

// Hitung jumlah data SMK, Jurusan, dan Pendaftar
$smkCount = $pdo->query("SELECT COUNT(*) FROM smk")->fetchColumn();
$jurusanCount = $pdo->query("SELECT COUNT(*) FROM jurusan2")->fetchColumn();
$usersCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>

<?php require_once "partials/admin_header.php"; ?>

<div class="row text-center">
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm">
            <h4>SMK</h4>
            <h2><?= $smkCount ?></h2>
            <a href="admin_smk.php" class="btn btn-primary btn-sm">Kelola SMK</a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm">
            <h4>Jurusan</h4>
            <h2><?= $jurusanCount ?></h2>
            <a href="admin_jurusan.php" class="btn btn-primary btn-sm">Kelola Jurusan</a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm">
            <h4>Pendaftar</h4>
            <h2><?= $usersCount ?></h2>
            <a href="admin_users.php" class="btn btn-primary btn-sm">Kelola Pendaftar</a>
        </div>
    </div>
</div>

<?php require_once "partials/admin_footer.php"; ?>
