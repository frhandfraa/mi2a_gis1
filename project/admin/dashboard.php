<?php 
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/auth.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-600 via-blue-800 to-indigo-900 text-white flex">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white/10 backdrop-blur-xl border-r border-white/20 
       p-6 flex flex-col shadow-2xl 
       relative z-[9999]">

        <h3 class="text-2xl font-bold mb-1">
            Admin<span class="text-sky-300">GIS</span>
        </h3>

        <p class="text-white/70 text-sm mb-6">
            <?= htmlspecialchars($_SESSION['admin_nama'] ?? $_SESSION['admin_username']) ?>
        </p>

        <nav class="space-y-2">
            <a href="dashboard.php"
               class="block py-2.5 px-4 rounded-xl bg-white/20 hover:bg-white/30 transition">
               📊 Dashboard
            </a>

            <a href="sekolah_list.php"
               class="block py-2.5 px-4 rounded-xl hover:bg-white/20 transition">
               🏫 Kelola Sekolah
            </a>

            <a href="sekolah_add.php"
               class="block py-2.5 px-4 rounded-xl hover:bg-white/20 transition">
               ➕ Tambah Sekolah
            </a>

            <a href="peta_admin.php"
                 class="block py-2.5 px-4 rounded-xl hover:bg-white/20 transition">
                🗺️ Lihat Peta
                </a>


            <a href="logout.php"
               class="block py-2.5 px-4 rounded-xl bg-red-600/30 hover:bg-red-700/40 text-red-200 mt-10 transition">
               🚪 Logout
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
   <main class="flex-1 p-10 overflow-y-auto relative z-[1]">

        <h1 class="text-4xl font-bold mb-8 tracking-wide">
            Selamat Datang, 
            <span class="text-sky-300"><?= htmlspecialchars($_SESSION['admin_nama']) ?></span>
        </h1>

        <!-- STATISTICS BOXES -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- TOTAL SEKOLAH -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-white/20">
                <div class="text-white/80">Total Sekolah</div>
                <?php
                    $r = $koneksi->query("SELECT COUNT(*) as total FROM sekolah")->fetch_assoc();
                ?>
                <div class="text-4xl font-bold mt-2"><?= $r['total'] ?? 0 ?></div>
            </div>

            <!-- TOTAL ADMIN -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-white/20">
                <div class="text-white/80">Admin Terdaftar</div>
                <?php
                    $r2 = $koneksi->query("SELECT COUNT(*) as total FROM admin")->fetch_assoc();
                ?>
                <div class="text-4xl font-bold mt-2"><?= $r2['total'] ?? 0 ?></div>
            </div>

            <!-- LAST UPDATE -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-white/20">
                <div class="text-white/80">Update Terakhir</div>
                <?php
                    $r3 = $koneksi->query("SELECT MAX(created_at) as last FROM sekolah")->fetch_assoc();
                ?>
                <div class="text-4xl font-bold mt-2">
                    <?= $r3['last'] ? date('d M Y', strtotime($r3['last'])) : '-' ?>
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="mt-12 text-white/40 text-sm tracking-wide">
            © <?= date("Y"); ?> AdminGIS — Zonasi SMK
        </div>
    </main>

</body>
</html>
