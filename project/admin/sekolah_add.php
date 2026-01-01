<?php
session_start();
if(!isset($_SESSION['login_admin'])){
    header("Location: login.php");
    exit;
}
require_once __DIR__.'/inc/config.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah Sekolah</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-600 via-blue-800 to-indigo-900 text-white flex">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white/10 backdrop-blur-xl border-r border-white/20 p-6 flex flex-col shadow-2xl relative z-[9999]">
        <h3 class="text-2xl font-bold mb-1">Admin<span class="text-sky-300">GIS</span></h3>
        <p class="text-white/70 text-sm mb-6">
            <?= htmlspecialchars($_SESSION['admin_nama'] ?? $_SESSION['admin_username']) ?>
        </p>

        <nav class="space-y-2">
            <a href="dashboard.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20 transition">📊 Dashboard</a>
            <a href="sekolah_list.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20 transition">🏫 Kelola Sekolah</a>
            <a href="sekolah_add.php" class="block py-2.5 px-4 rounded-xl bg-white/20 hover:bg-white/30 transition">➕ Tambah Sekolah</a>
            <a href="peta_admin.php" class="block py-2.5 px-4 rounded-xl bg-white/20 shadow-inner transition">🗺️ Lihat Peta</a>
            <a href="logout.php" class="block py-2.5 px-4 rounded-xl bg-red-600/30 hover:bg-red-700/40 text-red-200 mt-10 transition">🚪 Logout</a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-10 overflow-y-auto relative z-[1]">

        <h1 class="text-4xl font-bold mb-8 tracking-wide">Tambah <span class="text-sky-300">Data Sekolah</span></h1>

        <!-- FORM WRAPPER -->
        <div class="bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/20 shadow-2xl max-w-3xl">
            <form action="sekolah_add_proses.php" method="post" enctype="multipart/form-data" class="space-y-6">

                <!-- NAMA SEKOLAH -->
                <div>
                    <label class="block mb-1 text-white/80">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" required
                        class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none">
                </div>

                <!-- ALAMAT -->
                <div>
                    <label class="block mb-1 text-white/80">Alamat</label>
                    <textarea name="alamat" required rows="3"
                        class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none"></textarea>
                </div>

                <!-- KOORDINAT -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-1 text-white/80">Latitude</label>
                        <input type="text" name="latitude" required
                            class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none">
                    </div>

                    <div>
                        <label class="block mb-1 text-white/80">Longitude</label>
                        <input type="text" name="longitude" required
                            class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none">
                    </div>
                </div>

                <!-- ZONA -->
                <div>
                     <label class="block mb-1 text-white/80">Zona</label>
                    <input type="text" name="zona" required
                  class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none">
                </div>


                <!-- FOTO SEKOLAH -->
                <div>
                    <label class="block mb-1 text-white/80">Foto Sekolah</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full p-3 rounded-xl bg-white/20 border border-white/30 focus:border-sky-300 outline-none">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-sky-600 hover:bg-sky-700 rounded-xl font-bold transition shadow-lg">
                    Simpan Data
                </button>
            </form>
        </div>

        <div class="mt-8 text-white/40 text-sm tracking-wide">© <?= date("Y"); ?> AdminGIS — Zonasi SMK</div>
    </main>

</body>
</html>
