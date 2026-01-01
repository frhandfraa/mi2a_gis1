<?php
require_once __DIR__.'/inc/config.php';
require_once __DIR__.'/inc/auth.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id) header('Location: sekolah_list.php');

$row = $koneksi->query("SELECT foto FROM sekolah WHERE id = $id")->fetch_assoc();
if ($row && $row['foto']) {
    $p = __DIR__.'/upload/foto_sekolah/'.$row['foto'];
    if (file_exists($p)) @unlink($p);
}
$koneksi->query("DELETE FROM sekolah WHERE id = $id");
header('Location: sekolah_list.php');
exit;
