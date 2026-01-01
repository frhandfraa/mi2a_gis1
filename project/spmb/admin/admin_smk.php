<?php
session_start();
require_once "../config/database.php";

// Pastikan admin login
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

// Handle tambah/edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_smk = $_POST['id_smk'] ?? null;
    $nama = $_POST['nama_smk'];
    $kabupaten = $_POST['kabupaten'];
    $akreditasi = $_POST['akreditasi'];
    $latitude = $_POST['latitude'] ?? null;
    $longitude = $_POST['longitude'] ?? null;
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    if ($id_smk) {
        // Update
        $stmt = $pdo->prepare("UPDATE smk SET nama_smk=:nama, kabupaten=:kab, akreditasi=:akreditasi, latitude=:lat, longitude=:lng, is_active=:active WHERE id_smk=:id");
        $stmt->execute([
            ':nama'=>$nama, ':kab'=>$kabupaten, ':akreditasi'=>$akreditasi,
            ':lat'=>$latitude, ':lng'=>$longitude, ':active'=>$is_active, ':id'=>$id_smk
        ]);
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO smk (nama_smk,kabupaten,akreditasi,latitude,longitude,is_active) VALUES (:nama,:kab,:akreditasi,:lat,:lng,:active)");
        $stmt->execute([
            ':nama'=>$nama, ':kab'=>$kabupaten, ':akreditasi'=>$akreditasi,
            ':lat'=>$latitude, ':lng'=>$longitude, ':active'=>$is_active
        ]);
    }
    header("Location: admin_smk.php");
    exit;
}

// Handle hapus
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM smk WHERE id_smk=:id");
    $stmt->execute([':id'=>$_GET['delete']]);
    header("Location: admin_smk.php");
    exit;
}

// Ambil data SMK
$stmt = $pdo->prepare("SELECT * FROM smk ORDER BY nama_smk ASC");
$stmt->execute();
$smks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once "partials/admin_header.php"; ?>

<div class="container">
    <h2 class="mb-4">Kelola SMK</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#smkModal" onclick="openModal()">Tambah SMK</button>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama SMK</th>
                <th>Kabupaten</th>
                <th>Akreditasi</th>
                <th>Status</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($smks as $s): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($s['nama_smk']); ?></td>
                <td><?= htmlspecialchars($s['kabupaten']); ?></td>
                <td><?= $s['akreditasi']; ?></td>
                <td><?= $s['is_active'] ? "Aktif" : "Nonaktif"; ?></td>
                <td><?= $s['latitude']; ?></td>
                <td><?= $s['longitude']; ?></td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#smkModal" 
                        onclick='openModal(<?= json_encode($s) ?>)'>Edit</button>
                    <a href="?delete=<?= $s['id_smk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus SMK ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Form Tambah/Edit SMK -->
<div class="modal fade" id="smkModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah/Edit SMK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_smk" id="id_smk">
        <div class="mb-3">
            <label>Nama SMK</label>
            <input type="text" name="nama_smk" id="nama_smk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kabupaten</label>
            <input type="text" name="kabupaten" id="kabupaten" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Akreditasi</label>
            <select name="akreditasi" id="akreditasi" class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control">
        </div>
        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input">
            <label class="form-check-label">Aktif</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(data=null){
    if(data){
        document.getElementById('id_smk').value = data.id_smk;
        document.getElementById('nama_smk').value = data.nama_smk;
        document.getElementById('kabupaten').value = data.kabupaten;
        document.getElementById('akreditasi').value = data.akreditasi;
        document.getElementById('latitude').value = data.latitude;
        document.getElementById('longitude').value = data.longitude;
        document.getElementById('is_active').checked = data.is_active==1;
    } else {
        document.getElementById('id_smk').value = '';
        document.getElementById('nama_smk').value = '';
        document.getElementById('kabupaten').value = '';
        document.getElementById('akreditasi').value = 'C';
        document.getElementById('latitude').value = '';
        document.getElementById('longitude').value = '';
        document.getElementById('is_active').checked = true;
    }
}
</script>

<?php require_once "partials/admin_footer.php"; ?>
