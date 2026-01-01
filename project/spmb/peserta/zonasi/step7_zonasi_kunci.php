<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI LOGIN ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];

/* ================= VALIDASI AKSES ================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['finalisasi'])) {
    header("Location: step6_finalisasi.php");
    exit;
}

/* ================= AMBIL DATA ================= */
$stmt = $pdo->prepare("
    SELECT 
        jarak_pilihan1,
        jarak_pilihan2,
        zonasi_locked
    FROM peserta_biodata
    WHERE id_biodata = :id
    LIMIT 1
");
$stmt->execute(['id' => $id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data peserta tidak ditemukan.");
}

/* ================= VALIDASI ================= */

// Sudah dikunci
if ((int)$data['zonasi_locked'] === 1) {
    header("Location: selesai.php");
    exit;
}

// Jarak pilihan 1 wajib
if ($data['jarak_pilihan1'] === null) {
    header("Location: step3_ukurjarak.php");
    exit;
}

// Session zonasi wajib
if (!isset($_SESSION['zonasi'])) {
    header("Location: step6_finalisasi.php");
    exit;
}

/* ================= KUNCI ZONASI ================= */
$stmt = $pdo->prepare("
    UPDATE peserta_biodata
    SET 
        zonasi_locked = 1,
        zonasi_final_at = NOW()
    WHERE id_biodata = :id
");
$stmt->execute(['id' => $id_user]);

// Update users.status_pendaftaran menjadi 'final'
$stmt2 = $pdo->prepare("
    UPDATE users
    SET status_pendaftaran = 'final'
    WHERE id_user = :id
");
$stmt2->execute(['id' => $id_user]);


unset($_SESSION['zonasi']);

header("Location: selesai.php");
exit;
