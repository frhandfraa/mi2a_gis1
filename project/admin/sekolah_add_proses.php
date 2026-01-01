<?php
session_start();
if(!isset($_SESSION['login_admin'])){
    header("Location: login.php");
    exit;
}

require_once __DIR__.'/inc/config.php'; // pastikan path benar

function uploadFoto($file){
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if($file['error'] === 4) return null;
    if(!in_array($file['type'], $allowedTypes)) return false;

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = uniqid('foto_') . "." . $ext;
    $uploadDir = __DIR__ . '../uploads/';
    if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $destination = $uploadDir . $newName;
    return move_uploaded_file($file['tmp_name'], $destination) ? $newName : false;
}

// Ambil data
$nama = trim($_POST['nama_sekolah'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$zona = trim($_POST['zona'] ?? '');
$latitude = trim($_POST['latitude'] ?? '');
$longitude = trim($_POST['longitude'] ?? '');

// Validasi sederhana
if(empty($nama) || empty($alamat) || empty($zona) || empty($latitude) || empty($longitude)){
    $_SESSION['error'] = "Semua field wajib diisi!";
    header("Location: sekolah_add.php");
    exit;
}

// Upload foto
$foto = uploadFoto($_FILES['foto']);
if($foto === false){
    $_SESSION['error'] = "Upload foto gagal, pastikan format JPG/PNG/GIF!";
    header("Location: sekolah_add.php");
    exit;
}

// Simpan ke database
$stmt = $koneksi->prepare("INSERT INTO sekolah (nama_smk, alamat, zona, latitude, longitude, foto) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdds", $nama, $alamat, $zona, $latitude, $longitude, $foto);

if($stmt->execute()){
    $_SESSION['success'] = "Data sekolah berhasil ditambahkan!";
    header("Location: sekolah_list.php");
    exit;
} else {
    $_SESSION['error'] = "Terjadi kesalahan: " . $stmt->error;
    header("Location: sekolah_add.php");
    exit;
}
?>
