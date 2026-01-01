<?php
session_start();
require_once "../config/database.php";

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama_lengkap']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (!$nama || !$username || !$password || !$confirm) {
        $errors[] = "Semua field wajib diisi.";
    } elseif ($password !== $confirm) {
        $errors[] = "Password dan konfirmasi password tidak sama.";
    } else {
        // Cek username sudah ada atau belum
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=:username");
        $stmt->execute([':username'=>$username]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $errors[] = "Username sudah digunakan.";
        } else {
            // Hash password
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO admin (nama_lengkap, username, password) VALUES (:nama, :username, :password)");
            $stmt->execute([':nama'=>$nama, ':username'=>$username, ':password'=>$hash]);
            $success = "Registrasi berhasil! <a href='admin_login.php'>Login sekarang</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Admin SPMB SMK</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
.register-card {
    max-width: 400px;
    margin: 60px auto;
    background: white;
    padding: 30px 35px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.register-card h2 {
    text-align: center;
    color: #1E90FF;
    margin-bottom: 25px;
}
.register-card form label { display:block; margin-top:12px; font-weight:bold; color:#333; }
.register-card form input {
    width:100%; padding:10px; margin-top:5px; border-radius:8px; border:1px solid #ccc; box-sizing:border-box;
}
.register-card form button {
    width:100%; padding:12px; background-color:#1E90FF; color:white;
    border:none; font-size:16px; font-weight:bold; margin-top:20px; border-radius:8px; cursor:pointer;
}
.register-card form button:hover { background-color:#187bcd; }
.error-box { background-color:#ffe0e0; color:#d8000c; padding:10px; border-radius:8px; margin-bottom:15px; text-align:left; }
.success-box { background-color:#e0ffe0; color:#006400; padding:10px; border-radius:8px; margin-bottom:15px; text-align:left; }
</style>
</head>
<body>

<div class="register-card">
    <h2>Register Admin</h2>

    <?php if(!empty($errors)): ?>
    <div class="error-box">
        <ul>
            <?php foreach($errors as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($success): ?>
    <div class="success-box"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
