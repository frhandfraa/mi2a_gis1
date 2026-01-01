<?php
session_start();
require_once "config/database.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user_id']   = $user['id_user'];
    $_SESSION['peserta_nama'] = $user['nama_lengkap'];
    $_SESSION['status_verifikasi'] = $user['is_verified'];

    header("Location: peserta/dashboard.php");
    exit;
}
 else {
        $errors[] = "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login – SPMB SMK</title>
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
.error {
    background:#ffe1e1;
    padding:12px;
    border-radius:8px;
    color:#b30000;
    margin-bottom:15px;
}
.link {
    text-align:center;
    margin-top:20px;
}
</style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<div class="auth-box">
    <h2>Login Akun</h2>

    <?php if($errors): ?>
        <div class="error"><?= $errors[0] ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="register.php">Daftar</a>
    </div>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>
