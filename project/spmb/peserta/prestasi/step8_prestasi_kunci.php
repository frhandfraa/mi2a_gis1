<?php
session_start();
require_once "../../config/database.php";

/* =====================================================
   VALIDASI LOGIN
===================================================== */
if (!isset($_SESSION['prestasi_final'])) {
    header("Location: step7_finalisasi.php");
    exit;
}
unset($_SESSION['prestasi']);
unset($_SESSION['prestasi_final']);

$id_user = (int) $_SESSION['user_id'];

/* =====================================================
   VALIDASI AKSES (HARUS DARI STEP FINALISASI)
===================================================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['finalisasi'])) {
    header("Location: step7_finalisasi.php");
    exit;
}

/* =====================================================
   AMBIL DATA BIODATA
===================================================== */
$stmt = $pdo->prepare("
    SELECT 
        prestasi_locked
    FROM peserta_biodata
    WHERE id_biodata = :id
    LIMIT 1
");
$stmt->execute(['id' => $id_user]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data peserta tidak ditemukan.");
}

/* =====================================================
   VALIDASI FINAL
===================================================== */

// Jika sudah dikunci
if ((int) $data['prestasi_locked'] === 1) {
    header("Location: selesai.php");
    exit;
}

// Session prestasi wajib ada
if (!isset($_SESSION['prestasi'])) {
    header("Location: step7_finalisasi.php");
    exit;
}

/* =====================================================
   KUNCI DATA PRESTASI
===================================================== */
$stmt = $pdo->prepare("
    UPDATE peserta_biodata
    SET 
        prestasi_locked   = 1,
        prestasi_final_at = NOW()
    WHERE id_biodata = :id
");
$stmt->execute(['id' => $id_user]);

/* =====================================================
   UPDATE STATUS USER
===================================================== */
$stmt2 = $pdo->prepare("
    UPDATE users
    SET status_pendaftaran = 'final'
    WHERE id_user = :id
");
$stmt2->execute(['id' => $id_user]);

/* =====================================================
   BERSIHKAN SESSION
===================================================== */
unset($_SESSION['prestasi']);

/* =====================================================
   REDIRECT SELESAI
===================================================== */
header("Location: selesai.php");
exit;
