<?php
require_once "config/database.php";

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = trim($_POST['nama']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (!$nama || !$email || !$password) {
        $errors[] = "Semua field wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    } else {
        $cek = $pdo->prepare("SELECT id_user FROM users WHERE email = ?");
        $cek->execute([$email]);

        if ($cek->rowCount() > 0) {
            $errors[] = "Email sudah terdaftar.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare(
                "INSERT INTO users (nama_lengkap, email, password) VALUES (?, ?, ?)"
            );
            $stmt->execute([$nama, $email, $hash]);
            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Registrasi Akun – SPMB SMK</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body {
    margin:0;
    font-family:'Inter', sans-serif;
    background:#f4f7fb;
}
.auth-box {
    max-width:420px;
    margin:80px auto;
    background:#fff;
    padding:35px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}
.auth-box h2 {
    text-align:center;
    color:#0d6efd;
    margin-bottom:10px;
}
.auth-box p {
    text-align:center;
    font-size:14px;
    color:#666;
}
.auth-box label {
    display:block;
    margin-top:15px;
    font-weight:600;
}
.auth-box input {
    width:100%;
    padding:12px;
    margin-top:6px;
    border-radius:8px;
    border:1px solid #ccc;
}
.auth-box button {
    width:100%;
    padding:14px;
    margin-top:25px;
    border:none;
    background:linear-gradient(135deg,#0d6efd,#198754);
    color:#fff;
    font-weight:600;
    border-radius:10px;
    cursor:pointer;
}
.auth-box .link {
    text-align:center;
    margin-top:20px;
}
.error, .success {
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
}
.error { background:#ffe1e1; color:#b30000; }
.success { background:#e0f7ea; color:#0f5132; }
</style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<div class="auth-box">
    <h2>Registrasi Akun</h2>
    <p>Daftar untuk mengikuti SPMB SMK</p>

    <?php if($errors): ?>
        <div class="error">
            <ul>
                <?php foreach($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($success): ?>
        <div class="success">
            Registrasi berhasil. <a href="login.php">Login sekarang</a>
        </div>
    <?php endif; ?>

    <form method="post">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        Sudah punya akun? <a href="login.php">Login</a>
    </div>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>
