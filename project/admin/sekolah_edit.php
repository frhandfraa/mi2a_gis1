<?php
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/auth.php';

/* ===============================
   VALIDASI ID
================================ */
if (!isset($_GET['id'])) {
    header("Location: sekolah_list.php");
    exit;
}

$id = (int) $_GET['id'];

/* ===============================
   AMBIL DATA SEKOLAH
================================ */
$data = $koneksi->query(
    "SELECT * FROM sekolah WHERE id = $id"
)->fetch_assoc();

if (!$data) {
    header("Location: sekolah_list.php");
    exit;
}

/* ===============================
   PROSES UPDATE
================================ */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama      = $_POST['nama_smk'];
    $alamat    = $_POST['alamat'];
    $zona      = $_POST['zona'];
    $latitude  = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $foto_lama = $data['foto'];
    $foto = $foto_lama;

    /* UPLOAD FOTO BARU */
   if (!empty($_FILES['foto']['name'])) {
    $ext  = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $foto = uniqid('smk_') . "." . $ext;

    // upload ke folder
    move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . "/upload/foto_sekolah/" . $foto);

    // hapus file lama jika ada
    if ($foto_lama && file_exists(__DIR__ . "/upload/foto_sekolah/" . $foto_lama)) {
        unlink(__DIR__ . "/upload/foto_sekolah/" . $foto_lama);
    }
}

    /* UPDATE DATABASE */
    $stmt = $koneksi->prepare("
        UPDATE sekolah SET
            nama_smk = ?,
            alamat = ?,
            zona = ?,
            latitude = ?,
            longitude = ?,
            foto = ?
        WHERE id = ?
    ");

    $stmt->bind_param(
        "sssddsi",
        $nama,
        $alamat,
        $zona,
        $latitude,
        $longitude,
        $foto,
        $id
    );

    $stmt->execute();

    header("Location: sekolah_list.php");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Sekolah</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-700 via-blue-800 to-indigo-900 text-white flex">

<!-- SIDEBAR -->
<aside class="w-72 bg-white/10 backdrop-blur-xl border-r border-white/20 p-6 shadow-2xl">
    <h3 class="text-2xl font-bold mb-1">
        Admin<span class="text-sky-300">GIS</span>
    </h3>

    <p class="text-white/70 text-sm mb-6">
        <?= htmlspecialchars($_SESSION['admin_nama'] ?? $_SESSION['admin_username']) ?>
    </p>

    <nav class="space-y-2">
        <a href="dashboard.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">
            📊 Dashboard
        </a>
        <a href="sekolah_list.php" class="block py-2.5 px-4 rounded-xl bg-white/20 font-semibold">
            🏫 Kelola Sekolah
        </a>
        <a href="logout.php" class="block py-2.5 px-4 rounded-xl bg-red-600/30 hover:bg-red-700/40 mt-10 text-red-200">
            🚪 Logout
        </a>
    </nav>
</aside>

<!-- MAIN -->
<main class="flex-1 p-10 overflow-auto">

    <h1 class="text-4xl font-bold mb-10">Edit Data Sekolah</h1>

    <form method="post" enctype="multipart/form-data"
          class="max-w-3xl bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl shadow-xl p-8 space-y-6">

        <!-- NAMA -->
        <div>
            <label class="block mb-2 text-sm">Nama Sekolah</label>
            <input type="text" name="nama_smk" required
                   value="<?= htmlspecialchars($data['nama_smk']) ?>"
                   class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 focus:outline-none">
        </div>

        <!-- ALAMAT -->
        <div>
            <label class="block mb-2 text-sm">Alamat</label>
            <textarea name="alamat" rows="3" required
                      class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 focus:outline-none"><?= htmlspecialchars($data['alamat']) ?></textarea>
        </div>

        <!-- ZONA -->
        <div>
            <label class="block mb-2 text-sm">Zona</label>
            <input type="text" name="zona" required
                   value="<?= htmlspecialchars($data['zona']) ?>"
                   class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 focus:outline-none">
        </div>

        <!-- KOORDINAT -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-2 text-sm">Latitude</label>
                <input type="text" name="latitude" required
                       value="<?= htmlspecialchars($data['latitude']) ?>"
                       class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 focus:outline-none"
                       placeholder="-0.9142">
            </div>

            <div>
                <label class="block mb-2 text-sm">Longitude</label>
                <input type="text" name="longitude" required
                       value="<?= htmlspecialchars($data['longitude']) ?>"
                       class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 focus:outline-none"
                       placeholder="100.4661">
            </div>
        </div>

        <!-- FOTO -->
        <div>
            <label class="block mb-2 text-sm">Foto Sekolah</label>

            <?php if ($data['foto']): ?>
                <img src="upload/foto_sekolah/<?= htmlspecialchars($data['foto']) ?>"
                     class="w-40 h-28 object-cover rounded-xl mb-3 shadow">
            <?php endif; ?>

            <input type="file" name="foto"
                   class="block w-full text-sm text-white/70">
            <p class="text-xs text-white/40 mt-1">Kosongkan jika tidak diganti</p>
        </div>

        <!-- BUTTON -->
        <div class="flex gap-4 pt-6">
            <button type="submit"
                    class="px-6 py-3 bg-sky-500 hover:bg-sky-600 rounded-xl font-semibold shadow">
                💾 Simpan Perubahan
            </button>

            <a href="sekolah_list.php"
               class="px-6 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-semibold">
                ↩ Batal
            </a>
        </div>

    </form>

    <p class="text-white/40 text-center text-sm mt-10">
        © <?= date("Y") ?> AdminGIS — Edit Data Sekolah
    </p>

</main>

</body>
</html>
