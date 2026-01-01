<?php
session_start();
require_once "../config/database.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!$username || !$password) {
        $errors[] = "Username dan password wajib diisi.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=:username");
        $stmt->execute([':username'=>$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id_admin'];
            $_SESSION['admin_name'] = $admin['nama_lengkap'];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            $errors[] = "Username atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin SPMB SMK</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
.login-card {
    max-width: 400px;
    margin: 80px auto;
    background: white;
    padding: 30px 35px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.login-card h2 {
    text-align: center;
    color: #1E90FF;
    margin-bottom: 25px;
}
.login-card form label { display:block; margin-top:12px; font-weight:bold; color:#333; }
.login-card form input {
    width:100%; padding:10px; margin-top:5px; border-radius:8px; border:1px solid #ccc; box-sizing:border-box;
}
.login-card form button {
    width:100%; padding:12px; background-color:#1E90FF; color:white;
    border:none; font-size:16px; font-weight:bold; margin-top:20px; border-radius:8px; cursor:pointer;
}
.login-card form button:hover { background-color:#187bcd; }
.error-box { background-color:#ffe0e0; color:#d8000c; padding:10px; border-radius:8px; margin-bottom:15px; text-align:left; }
/* Tombol register */
.register-btn {
    display:block;
    width:100%;
    padding:12px;
    background-color:#32CD32;
    color:white;
    border:none;
    font-size:16px;
    font-weight:bold;
    margin-top:10px;
    border-radius:8px;
    text-align:center;
    text-decoration:none;
}
.register-btn:hover { background-color:#28a428; }
</style>
</head>
<body>

<div class="login-card">
    <h2>Login Admin</h2>

    <?php if(!empty($errors)): ?>
    <div class="error-box">
        <ul>
            <?php foreach($errors as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <a href="admin_register.php" class="register-btn">Register Admin</a>
</div>

</body>
</html>
