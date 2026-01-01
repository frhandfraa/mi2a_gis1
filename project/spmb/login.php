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
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['peserta_nama'] = $user['nama_lengkap'];
        $_SESSION['status_verifikasi'] = $user['is_verified'];

        header("Location: peserta/dashboard.php");
        exit;
    } else {
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
/* ===== GLOBAL ===== */
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #f0f4f8;
}

/* ===== ANIMASI ===== */
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ===== AUTH CONTAINER ===== */
.auth-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
}

/* ===== AUTH BOX ===== */
.auth-container {
    width: 100%;
    max-width: 460px;
    background: #fff;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    animation: fadeUp 0.8s ease forwards;
}

/* ===== LOGO + HEADER ===== */
.auth-header {
    text-align: center;
    margin-bottom: 25px;
}

.auth-header img {
    height: 50px;
    margin: 0 8px;
    vertical-align: middle;
}

.auth-header h3 {
    font-size: 16px;
    font-weight: 600;
    color: #555;
    margin: 8px 0 0;
}

.auth-header h1 {
    font-size: 28px;
    color: #0d6efd;
    margin: 5px 0 0;
}

/* ===== ERROR MESSAGE ===== */
.error {
    background: #ffe1e1;
    padding: 12px 15px;
    border-radius: 10px;
    color: #b30000;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 500;
}

/* ===== FORM ===== */
.auth-box label {
    display: block;
    margin-top: 15px;
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.auth-box input {
    width: 100%;
    padding: 12px 15px;
    margin-top: 6px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 14px;
    transition: all 0.3s ease;
}

.auth-box input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13,110,253,0.2);
    outline: none;
}

/* ===== BUTTON ===== */
.auth-box button {
    width: 100%;
    padding: 14px;
    margin-top: 25px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg,#0d6efd,#198754);
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.auth-box button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* ===== LINK ===== */
.link {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

.link a {
    color: #0d6efd;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.link a:hover {
    text-decoration: underline;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 480px) {
    .auth-container {
        padding: 30px 20px;
    }
    .auth-header h1 {
        font-size: 24px;
    }
    .auth-box button {
        font-size: 15px;
        padding: 12px;
    }
}
</style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<div class="auth-page">
    <div class="auth-container">

        <!-- LOGO + HEADER -->
        <div class="auth-header">
            <img src="assets/img/logo_sumbar.png" alt="Logo Sumbar">
            <img src="assets/img/logo_disdik.png" alt="Logo Disdik">
            <h3>Pemerintah Sumatera Barat – Dinas Pendidikan Sumatera Barat</h3>
            <h1>Login SPMB SMK</h1>
        </div>

        <!-- FORM LOGIN -->
        <div class="auth-box">
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

    </div>
</div>

<?php include "partials/footer.php"; ?>

</body>
</html>
