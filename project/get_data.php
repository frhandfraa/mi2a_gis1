<?php
header('Content-Type: application/json');

$koneksi = new mysqli("localhost", "root", "", "zonasi_smk");
if ($koneksi->connect_error) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT 
            id,
            nama_smk,
            alamat,
            latitude,
            longitude,
            zona,
            status,
            foto
        FROM sekolah
        WHERE latitude IS NOT NULL 
          AND longitude IS NOT NULL";

$result = $koneksi->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {

    // Set path foto agar bisa dibaca JS
    $row['foto'] = $row['foto']
        ? "upload/foto_sekolah/" . $row['foto']
        : null;

    $data[] = $row;
}

echo json_encode($data);
