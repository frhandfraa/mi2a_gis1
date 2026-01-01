<?php
require_once "../../config/database.php";

$id_smk = 27;

$stmt = $pdo->prepare("SELECT id_jurusan, nama_jurusan FROM jurusan2 WHERE id_smk=?");
$stmt->execute([$id_smk]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);
?>
