<?php
session_start();
require_once "../../config/database.php";

/* ================= VALIDASI SESSION ================= */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

/* ================= CEK STATUS KUNCI ================= */
$stmt = $pdo->prepare("
    SELECT afirmasi_locked 
    FROM peserta_biodata 
    WHERE id_biodata = :id
");
$stmt->execute(['id' => $id_user]);
$status = $stmt->fetchColumn();

if ($status == 1) {
    $_SESSION['error'] = "Data afirmasi sudah difinalisasi.";
    header("Location: step6_finalisasi.php");
    exit;
}

/* ================= SIMPAN DATA AFIRMASI (JIKA MASIH DI SESSION) ================= */
if (!empty($_SESSION['afirmasi'])) {
    $stmt = $pdo->prepare("
        UPDATE peserta_biodata 
        SET data_afirmasi = :afirmasi
        WHERE id_biodata = :id
    ");
    $stmt->execute([
        'afirmasi' => json_encode($_SESSION['afirmasi']),
        'id'       => $id_user
    ]);
}

/* ================= KUNCI AFIRMASI ================= */
$stmt = $pdo->prepare("
    UPDATE peserta_biodata
    SET afirmasi_locked = 1,
        afirmasi_final_at = NOW()
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


/* ================= BERSIHKAN SESSION ================= */
unset($_SESSION['afirmasi']);

/* ================= REDIRECT ================= */
$_SESSION['success'] = "Data afirmasi berhasil difinalisasi dan dikunci.";
header("Location: selesai.php");
exit;
