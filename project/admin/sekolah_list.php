<?php
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/auth.php';

$res = $koneksi->query("SELECT * FROM sekolah ORDER BY id DESC");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kelola Sekolah</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-700 via-blue-800 to-indigo-900 text-white flex">

<!-- SIDEBAR -->
<aside class="w-72 bg-white/10 backdrop-blur-xl border-r border-white/20 p-6 shadow-2xl flex flex-col">
    <h3 class="text-2xl font-bold mb-1">
        Admin<span class="text-sky-300">GIS</span>
    </h3>

    <p class="text-white/70 text-sm mb-6">
        <?= htmlspecialchars($_SESSION['admin_nama'] ?? $_SESSION['admin_username']) ?>
    </p>

    <nav class="space-y-2">
        <a href="dashboard.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">📊 Dashboard</a>
        <a href="sekolah_list.php" class="block py-2.5 px-4 rounded-xl bg-white/20 font-semibold">🏫 Kelola Sekolah</a>
        <a href="sekolah_add.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">➕ Tambah Sekolah</a>
        <a href="peta_admin.php" class="block py-2.5 px-4 rounded-xl bg-white/20 shadow-inner">🗺️ Lihat Peta</a>
        <a href="logout.php" class="block py-2.5 px-4 rounded-xl bg-red-600/30 hover:bg-red-700/40 mt-10 text-red-200">🚪 Logout</a>
    </nav>
</aside>

<!-- MAIN -->
<main class="flex-1 p-10 overflow-auto">

    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-bold tracking-wide">Kelola Data Sekolah</h1>
        <a href="sekolah_add.php" class="px-5 py-3 bg-sky-500 hover:bg-sky-600 rounded-xl shadow-lg font-semibold">
            + Tambah Sekolah
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl shadow-xl overflow-auto">

        <table class="min-w-full text-sm text-white/90">
            <thead class="bg-white/10 text-white uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">Nama Sekolah</th>
                    <th class="px-6 py-4 text-left">Alamat</th>
                    <th class="px-6 py-4 text-left">Zona</th>
                    <th class="px-6 py-4 text-left">Latitude</th>
                    <th class="px-6 py-4 text-left">Longitude</th>
                    <th class="px-6 py-4 text-left">Foto</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i=1; while($row = $res->fetch_assoc()): ?>
                <tr class="border-t border-white/10 hover:bg-white/10 transition">
                    <td class="px-6 py-4"><?= $i++ ?></td>

                    <td class="px-6 py-4 font-semibold">
                        <?= htmlspecialchars($row['nama_smk']) ?>
                    </td>

                    <td class="px-6 py-4 text-white/70">
                        <?= htmlspecialchars(substr($row['alamat'], 0, 60)) ?>…
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-lg bg-indigo-600/40 border border-indigo-300/20 text-xs">
                            <?= htmlspecialchars($row['zona']) ?>
                        </span>
                    </td>

                    <td class="px-6 py-4 text-white/80">
                        <?= htmlspecialchars($row['latitude']) ?>
                    </td>

                    <td class="px-6 py-4 text-white/80">
                        <?= htmlspecialchars($row['longitude']) ?>
                    </td>

                    <td class="px-6 py-4">
                        <?php if ($row['foto']): ?>
                            <img src="upload/foto_sekolah/<?= htmlspecialchars($row['foto']) ?>"
                                 class="w-20 h-16 object-cover rounded-lg shadow">
                        <?php else: ?>
                            <span class="text-white/40">Tidak ada</span>
                        <?php endif; ?>
                    </td>

                    <td class="px-6 py-4 space-x-3">
                        <a href="sekolah_edit.php?id=<?= $row['id'] ?>"
                           class="text-sky-300 hover:text-sky-100 font-semibold">
                            Edit
                        </a>

                        <a href="sekolah_delete.php?id=<?= $row['id'] ?>"
                           onclick="return confirm('Yakin hapus data ini?')"
                           class="text-red-300 hover:text-red-100 font-semibold">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

    <p class="text-white/40 text-center text-sm mt-10">
        © <?= date("Y") ?> AdminGIS — Kelola Data Zonasi SMK
    </p>

</main>

</body>
</html>
