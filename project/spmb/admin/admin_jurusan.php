<?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

// Tambah/Edit Jurusan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jurusan2 = $_POST['id_jurusan'] ?? null;
    $id_smk = $_POST['id_smk'];
    $nama = $_POST['nama_jurusan'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    if ($id_jurusan2) {
        $stmt = $pdo->prepare("UPDATE jurusan2 SET id_smk=:id_smk, nama_jurusan=:nama, is_active=:active WHERE id_jurusan2=:id");
        $stmt->execute([':id_smk'=>$id_smk, ':nama'=>$nama, ':active'=>$is_active, ':id'=>$id_jurusan2]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO jurusan2 (id_smk,nama_jurusan,is_active) VALUES (:id_smk,:nama,:active)");
        $stmt->execute([':id_smk'=>$id_smk, ':nama'=>$nama, ':active'=>$is_active]);
    }
    header("Location: admin_jurusan.php");
    exit;
}

// Hapus jurusan
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM jurusan2 WHERE id_jurusan2=:id");
    $stmt->execute([':id'=>$_GET['delete']]);
    header("Location: admin_jurusan.php");
    exit;
}

// Ambil data jurusan dengan SMK
$stmt = $pdo->query("SELECT j.*, s.nama_smk FROM jurusan2 j LEFT JOIN smk s ON j.id_smk=s.id_smk ORDER BY j.nama_jurusan ASC");
$jurusans = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil data SMK untuk dropdown
$smks = $pdo->query("SELECT id_smk, nama_smk FROM smk WHERE is_active=1 ORDER BY nama_smk ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once "partials/admin_header.php"; ?>

<h2 class="mb-4">Kelola Jurusan</h2>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#jurusanModal" onclick="openModal()">Tambah Jurusan</button>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>SMK</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($jurusans as $j): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($j['nama_jurusan']); ?></td>
            <td><?= htmlspecialchars($j['nama_smk']); ?></td>
             <td>
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#jurusanModal" 
                        onclick='openModal(<?= json_encode($j) ?>)'>Edit</button>
                <a href="?delete=<?= $j['id_jurusan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus jurusan ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Form Tambah/Edit Jurusan -->
<div class="modal fade" id="jurusanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah/Edit Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_jurusan" id="id_jurusan">
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>SMK</label>
            <select name="id_smk" id="id_smk" class="form-control">
                <?php foreach($smks as $s): ?>
                <option value="<?= $s['id_smk'] ?>"><?= htmlspecialchars($s['nama_smk']) ?></option>
                <?php endforeach; ?>
            </select>
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
        document.getElementById('id_jurusan').value = data.id_jurusan2;
        document.getElementById('nama_jurusan').value = data.nama_jurusan;
        document.getElementById('id_smk').value = data.id_smk;
        document.getElementById('is_active').checked = data.is_active==1;
    } else {
        document.getElementById('id_jurusan').value = '';
        document.getElementById('nama_jurusan').value = '';
        document.getElementById('id_smk').value = <?= $smks[0]['id_smk'] ?? 0 ?>;
        document.getElementById('is_active').checked = true;
    }
}
</script>

<?php require_once "partials/admin_footer.php"; ?>
