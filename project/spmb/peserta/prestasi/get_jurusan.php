<?php
require_once "../../config/database.php";

$id_smk = $_GET['id_smk'] ?? null;

if (!$id_smk) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("SELECT id_jurusan, nama_jurusan FROM jurusan2 WHERE id_smk=? ORDER BY nama_jurusan");
$stmt->execute([$id_smk]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);
