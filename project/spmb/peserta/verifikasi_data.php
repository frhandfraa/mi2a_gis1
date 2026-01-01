<?php
session_start();
require_once __DIR__ . "/../config/database.php";

/* =====================
   CEK LOGIN
===================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* =====================
   CEK STATUS FINAL BIODATA
===================== */
$cekFinal = $pdo->prepare("
    SELECT biodata_final 
    FROM peserta_biodata 
    WHERE id_user = ?
");
$cekFinal->execute([$user_id]);
$finalRow = $cekFinal->fetch(PDO::FETCH_ASSOC);

$is_final = ($finalRow && (int)$finalRow['biodata_final'] === 1);

/* =====================
   AMBIL DATA BIODATA
===================== */
$stmt = $pdo->prepare("
    SELECT * FROM peserta_biodata 
    WHERE id_user = ?
");
$stmt->execute([$user_id]);
$existing = $stmt->fetch(PDO::FETCH_ASSOC);

/* =====================
   PROSES SIMPAN DATA
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Jika sudah final → langsung ke finalisasi
    if ($is_final) {
        header("Location: verifikasi_final.php");
        exit;
    }

    if ($existing) {
        // UPDATE
        $stmt = $pdo->prepare("
            UPDATE peserta_biodata SET 
                nama_lengkap=?, nama_panggilan=?, nik=?, nisn=?, no_kk=?,
                tempat_lahir=?, tanggal_lahir=?, jenis_kelamin=?, agama=?, kewarganegaraan=?,
                anak_ke=?, jumlah_saudara=?, status_keluarga=?,
                jalan=?, rt=?, rw=?, kelurahan=?, kecamatan=?, kabupaten=?, provinsi=?, kode_pos=?,
                status_tinggal=?, jarak_sekolah=?, transportasi=?,
                tinggi_badan=?, berat_badan=?, kebutuhan_khusus=?,
                no_hp=?, email=?
            WHERE id_user=?
        ");

        $stmt->execute([
            $_POST['nama_lengkap'], $_POST['nama_panggilan'], $_POST['nik'],
            $_POST['nisn'], $_POST['no_kk'], $_POST['tempat_lahir'],
            $_POST['tanggal_lahir'], $_POST['jenis_kelamin'], $_POST['agama'],
            $_POST['kewarganegaraan'], $_POST['anak_ke'], $_POST['jumlah_saudara'],
            $_POST['status_keluarga'], $_POST['jalan'], $_POST['rt'], $_POST['rw'],
            $_POST['kelurahan'], $_POST['kecamatan'], $_POST['kabupaten'],
            $_POST['provinsi'], $_POST['kode_pos'], $_POST['status_tinggal'],
            $_POST['jarak_sekolah'], $_POST['transportasi'],
            $_POST['tinggi_badan'], $_POST['berat_badan'], $_POST['kebutuhan_khusus'],
            $_POST['no_hp'], $_POST['email'],
            $user_id
        ]);
    } else {
        // INSERT
        $stmt = $pdo->prepare("
            INSERT INTO peserta_biodata (
                id_user, nama_lengkap, nama_panggilan, nik, nisn, no_kk,
                tempat_lahir, tanggal_lahir, jenis_kelamin, agama, kewarganegaraan,
                anak_ke, jumlah_saudara, status_keluarga,
                jalan, rt, rw, kelurahan, kecamatan, kabupaten, provinsi, kode_pos,
                status_tinggal, jarak_sekolah, transportasi,
                tinggi_badan, berat_badan, kebutuhan_khusus,
                no_hp, email, biodata_final
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0)
        ");

        $stmt->execute([
            $user_id,
            $_POST['nama_lengkap'], $_POST['nama_panggilan'], $_POST['nik'],
            $_POST['nisn'], $_POST['no_kk'], $_POST['tempat_lahir'],
            $_POST['tanggal_lahir'], $_POST['jenis_kelamin'], $_POST['agama'],
            $_POST['kewarganegaraan'], $_POST['anak_ke'], $_POST['jumlah_saudara'],
            $_POST['status_keluarga'], $_POST['jalan'], $_POST['rt'], $_POST['rw'],
            $_POST['kelurahan'], $_POST['kecamatan'], $_POST['kabupaten'],
            $_POST['provinsi'], $_POST['kode_pos'], $_POST['status_tinggal'],
            $_POST['jarak_sekolah'], $_POST['transportasi'],
            $_POST['tinggi_badan'], $_POST['berat_badan'], $_POST['kebutuhan_khusus'],
            $_POST['no_hp'], $_POST['email']
        ]);
    }

    header("Location: verifikasi_final.php");
    exit;
}
?>

<?php include "partials/header.php"; ?>
<?php include "partials/navbar.php"; ?>

<div class="form-box">
    <h3 class="mb-4">📝 Verifikasi Data Pribadi Peserta</h3>

    <form method="post">

        <!-- A. DATA IDENTITAS -->
        <h5 class="section-title">A. Data Identitas</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label>Nama Lengkap (sesuai akta)</label>
                <input type="text" name="nama_lengkap" class="form-control"
                       value="<?= htmlspecialchars($existing['nama_lengkap'] ?? '') ?>"
                       required <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-6">
                <label>Nama Panggilan</label>
                <input type="text" name="nama_panggilan" class="form-control"
                       value="<?= htmlspecialchars($existing['nama_panggilan'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control"
                       value="<?= htmlspecialchars($existing['nik'] ?? '') ?>"
                       required <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control"
                       value="<?= htmlspecialchars($existing['nisn'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>No. KK</label>
                <input type="text" name="no_kk" class="form-control"
                       value="<?= htmlspecialchars($existing['no_kk'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>
        </div>

        <!-- B. DATA KELAHIRAN -->
        <h5 class="section-title mt-4">B. Data Kelahiran</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control"
                       value="<?= htmlspecialchars($existing['tempat_lahir'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                       value="<?= htmlspecialchars($existing['tanggal_lahir'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" <?= $is_final ? 'disabled' : '' ?>>
                    <option value="L" <?= ($existing['jenis_kelamin'] ?? '')=='L' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= ($existing['jenis_kelamin'] ?? '')=='P' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div class="col-md-4">
                <label>Agama</label>
                <?php $a = $existing['agama'] ?? ''; ?>
                <select name="agama" class="form-select" <?= $is_final ? 'disabled' : '' ?>>
                    <option value="Islam" <?= $a=='Islam'?'selected':'' ?>>Islam</option>
                    <option value="Kristen Protestan" <?= $a=='Kristen Protestan'?'selected':'' ?>>Kristen Protestan</option>
                    <option value="Katolik" <?= $a=='Katolik'?'selected':'' ?>>Katolik</option>
                    <option value="Hindu" <?= $a=='Hindu'?'selected':'' ?>>Hindu</option>
                    <option value="Buddha" <?= $a=='Buddha'?'selected':'' ?>>Buddha</option>
                    <option value="Konghucu" <?= $a=='Konghucu'?'selected':'' ?>>Konghucu</option>
                    <option value="Lainnya" <?= ($a && !in_array($a,['Islam','Kristen Protestan','Katolik','Hindu','Buddha','Konghucu']))?'selected':'' ?>>Lainnya</option>
                </select>
            </div>

            <div class="col-md-4">
                <label>Kewarganegaraan</label>
                <?php $kwn = $existing['kewarganegaraan'] ?? 'Indonesia'; ?>
                <select name="kewarganegaraan" class="form-select" <?= $is_final ? 'disabled' : '' ?>>
                    <option value="Indonesia" <?= $kwn=='Indonesia'?'selected':'' ?>>Indonesia</option>
                    <option value="Asing" <?= $kwn!='Indonesia'?'selected':'' ?>>Asing</option>
                </select>
            </div>
        </div>

        <!-- C. DATA KELUARGA -->
        <h5 class="section-title mt-4">C. Data Keluarga</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <label>Anak Ke-</label>
                <input type="number" name="anak_ke" class="form-control"
                       value="<?= htmlspecialchars($existing['anak_ke'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>Jumlah Saudara Kandung</label>
                <input type="number" name="jumlah_saudara" class="form-control"
                       value="<?= htmlspecialchars($existing['jumlah_saudara'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-4">
                <label>Status dalam Keluarga</label>
                <select name="status_keluarga" class="form-control" <?= $is_final ? 'disabled' : '' ?>>
                    <option value="kandung" <?= ($existing['status_keluarga'] ?? '')=='kandung'?'selected':'' ?>>Kandung</option>
                    <option value="tiri" <?= ($existing['status_keluarga'] ?? '')=='tiri'?'selected':'' ?>>Tiri</option>
                    <option value="angkat" <?= ($existing['status_keluarga'] ?? '')=='angkat'?'selected':'' ?>>Angkat</option>
                </select>
            </div>
        </div>

        <!-- D. ALAMAT LENGKAP  -->
        <h5 class="section-title mt-4">D. Alamat Lengkap</h5>
  <div class="row g-3">
      <div class="col-md-6">
          <label>Jalan / Dusun</label>
          <input type="text" name="jalan" class="form-control"
            value="<?= htmlspecialchars($existing['jalan'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-3">
          <label>RT</label>
          <input type="text" name="rt" class="form-control"
            value="<?= htmlspecialchars($existing['rt'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-3">
          <label>RW</label>
          <input type="text" name="rw" class="form-control"
            value="<?= htmlspecialchars($existing['rw'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-4">
          <label>Kelurahan</label>
          <input type="text" name="kelurahan" class="form-control"
            value="<?= htmlspecialchars($existing['kelurahan'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-4">
          <label>Kecamatan</label>
          <input type="text" name="kecamatan" class="form-control"
            value="<?= htmlspecialchars($existing['kecamatan'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-4">
          <label>Kabupaten / Kota</label>
          <input type="text" name="kabupaten" class="form-control"
            value="<?= htmlspecialchars($existing['kabupaten'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-4">
          <label>Provinsi</label>
          <input type="text" name="provinsi" class="form-control"
            value="<?= htmlspecialchars($existing['provinsi'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>

      <div class="col-md-2">
          <label>Kode Pos</label>
          <input type="text" name="kode_pos" class="form-control"
            value="<?= htmlspecialchars($existing['kode_pos'] ?? '') ?>"
            <?= $is_final ? 'disabled' : '' ?>>
      </div>
  </div>

        <!-- E. DATA LAINNYA -->
         <!-- E. DATA TAMBAHAN -->
<h5 class="section-title mt-4">E. Data Tambahan</h5>
<div class="row g-3">

    <div class="col-md-4">
        <label>Status Tempat Tinggal</label>
        <?php $st = $existing['status_tinggal'] ?? ''; ?>
        <select name="status_tinggal" class="form-select" <?= $is_final ? 'disabled' : '' ?>>
            <option value="">-- Pilih --</option>
            <option value="Bersama Orang Tua" <?= $st=='Bersama Orang Tua'?'selected':'' ?>>Bersama Orang Tua</option>
            <option value="Wali" <?= $st=='Wali'?'selected':'' ?>>Wali</option>
            <option value="Kos" <?= $st=='Kos'?'selected':'' ?>>Kos</option>
            <option value="Asrama" <?= $st=='Asrama'?'selected':'' ?>>Asrama</option>
            <option value="Lainnya" <?= $st=='Lainnya'?'selected':'' ?>>Lainnya</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Jarak ke Sekolah</label>
        <input type="text" name="jarak_sekolah" class="form-control"
               value="<?= htmlspecialchars($existing['jarak_sekolah'] ?? '') ?>"
               <?= $is_final ? 'disabled' : '' ?>>
    </div>

    <div class="col-md-4">
        <label>Moda Transportasi</label>
        <?php $t = $existing['transportasi'] ?? ''; ?>
        <select name="transportasi" class="form-select" <?= $is_final ? 'disabled' : '' ?>>
            <option value="">-- Pilih --</option>
            <option value="Jalan Kaki" <?= $t=='Jalan Kaki'?'selected':'' ?>>Jalan Kaki</option>
            <option value="Sepeda" <?= $t=='Sepeda'?'selected':'' ?>>Sepeda</option>
            <option value="Sepeda Motor" <?= $t=='Sepeda Motor'?'selected':'' ?>>Sepeda Motor</option>
            <option value="Mobil" <?= $t=='Mobil'?'selected':'' ?>>Mobil</option>
            <option value="Angkutan Umum" <?= $t=='Angkutan Umum'?'selected':'' ?>>Angkutan Umum</option>
            <option value="Antar Jemput" <?= $t=='Antar Jemput'?'selected':'' ?>>Antar Jemput</option>
            <option value="Lainnya" <?= $t=='Lainnya'?'selected':'' ?>>Lainnya</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Tinggi Badan (cm)</label>
        <input type="number" name="tinggi_badan" class="form-control"
               value="<?= htmlspecialchars($existing['tinggi_badan'] ?? '') ?>"
               <?= $is_final ? 'disabled' : '' ?>>
    </div>

    <div class="col-md-3">
        <label>Berat Badan (kg)</label>
        <input type="number" name="berat_badan" class="form-control"
               value="<?= htmlspecialchars($existing['berat_badan'] ?? '') ?>"
               <?= $is_final ? 'disabled' : '' ?>>
    </div>

    <div class="col-md-6">
        <label>Kebutuhan Khusus</label>
        <input type="text" name="kebutuhan_khusus" class="form-control"
               value="<?= htmlspecialchars($existing['kebutuhan_khusus'] ?? '') ?>"
               <?= $is_final ? 'disabled' : '' ?>>
    </div>

</div>


        <!-- F. KONTAK -->
        <h5 class="section-title mt-4">F. Kontak</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label>No HP Aktif</label>
                <input type="text" name="no_hp" class="form-control"
                       value="<?= htmlspecialchars($existing['no_hp'] ?? '') ?>"
                       required <?= $is_final ? 'disabled' : '' ?>>
            </div>

            <div class="col-md-6">
                <label>Email Aktif</label>
                <input type="email" name="email" class="form-control"
                       value="<?= htmlspecialchars($existing['email'] ?? '') ?>"
                       <?= $is_final ? 'disabled' : '' ?>>
            </div>
        </div>

        <!-- TOMBOL -->
        <div class="mt-5 text-end">
            <?php if ($is_final): ?>
                <a href="verifikasi_final.php" class="btn btn-secondary px-5 py-2">
                    Lihat Finalisasi
                </a>
            <?php else: ?>
                <button class="btn btn-primary px-5 py-2">
                    Simpan & Lanjut Finalisasi
                </button>
            <?php endif; ?>
        </div>

    </form>
</div>

<?php include "partials/footer.php"; ?>
