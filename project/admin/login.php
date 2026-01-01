<?php
session_start();
include "inc/config.php";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $cek = $koneksi->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if ($cek->num_rows > 0) {
        $row = $cek->fetch_assoc();

        $_SESSION['login_admin']    = true;
        $_SESSION['admin_id']       = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        $_SESSION['admin_nama']     = $row['nama'] ?? $row['username'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username / Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-500 via-blue-700 to-indigo-900 flex items-center justify-center p-4">

    <!-- CARD LOGIN -->
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl p-10 w-full max-w-md
                animate-[fadeIn_0.8s_ease]">

        <h2 class="text-center text-3xl font-bold text-white tracking-wide mb-2">
            Admin <span class="text-sky-300">GIS</span>
        </h2>

        <p class="text-center text-white/70 mb-6">
            Masukkan kredensial untuk melanjutkan
        </p>

        <?php if(isset($error)) : ?>
            <p class="mb-4 text-center bg-red-500/60 text-white py-2 px-3 rounded-lg text-sm">
                <?= $error ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="text-white text-sm">Username</label>
                <input type="text" name="username" required
                       class="w-full mt-1 px-4 py-3 rounded-xl bg-white/20 border border-white/30
                              text-white placeholder-white/60 focus:outline-none focus:ring-2
                              focus:ring-sky-300 focus:border-transparent">
            </div>

            <div>
                <label class="text-white text-sm">Password</label>
                <input type="password" name="password" required
                       class="w-full mt-1 px-4 py-3 rounded-xl bg-white/20 border border-white/30
                              text-white placeholder-white/60 focus:outline-none focus:ring-2
                              focus:ring-sky-300 focus:border-transparent">
            </div>

            <button name="login"
                class="w-full py-3 rounded-xl mt-2 font-semibold text-white bg-sky-600 hover:bg-sky-700
                       shadow-lg shadow-sky-900/40 transition-all duration-200">
                Login Sekarang
            </button>
        </form>

        <div class="text-center mt-6 text-white/60 text-sm">
            © <?= date("Y"); ?> AdminGIS — Zonasi SMK
        </div>
    </div>

</body>
</html>
