<?php
require_once "config/database.php";

$keyword    = $_GET['keyword'] ?? '';
$kabupaten  = $_GET['kabupaten'] ?? '';
$akreditasi = $_GET['akreditasi'] ?? '';
$page       = $_GET['page'] ?? 1;
$limit      = 10;
$offset     = ($page - 1) * $limit;

$sqlBase = "
    FROM smk
    LEFT JOIN jurusan 
        ON smk.id_smk = jurusan.id_smk 
        AND jurusan.is_active = 1
    WHERE smk.is_active = 1
";

$params = [];

if ($keyword) {
    $sqlBase .= " AND smk.nama_smk LIKE :keyword";
    $params[':keyword'] = "%$keyword%";
}
if ($kabupaten) {
    $sqlBase .= " AND smk.kabupaten = :kabupaten";
    $params[':kabupaten'] = $kabupaten;
}
if ($akreditasi) {
    $sqlBase .= " AND smk.akreditasi = :akreditasi";
    $params[':akreditasi'] = $akreditasi;
}

/* Hitung total data */
$sqlCount = "SELECT COUNT(DISTINCT smk.id_smk) " . $sqlBase;
$stmt = $conn->prepare($sqlCount);
$stmt->execute($params);
$totalData = $stmt->fetchColumn();
$totalPage = ceil($totalData / $limit);

/* Ambil data per halaman */
$sqlData = "
    SELECT 
        smk.id_smk,
        smk.nama_smk,
        smk.kabupaten,
        smk.akreditasi,
        smk.latitude,
        smk.longitude,
        COUNT(jurusan.id_jurusan) AS total_jurusan
    $sqlBase
    GROUP BY smk.id_smk
    ORDER BY smk.nama_smk ASC
    LIMIT $limit OFFSET $offset
";

$stmt = $conn->prepare($sqlData);
$stmt->execute($params);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'data' => $data,
    'totalPage' => $totalPage
]);
