<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi SPMB – SPMB SMK Sumatera Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #198754);
            color: #fff;
            padding: 45px 20px;
        }

        .page-header .container {
            max-width: 1140px;
            margin: auto;
        }

        .page-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
        }

        .page-header p {
            margin-top: 8px;
            opacity: 0.95;
        }

        .section {
            padding: 40px 20px;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        .info-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .info-card h2 {
            margin-top: 0;
            color: #0d6efd;
            font-size: 22px;
        }

        .info-card ul {
            padding-left: 20px;
        }

        .info-card ul li {
            margin-bottom: 8px;
        }

        .cta-box {
            text-align: center;
            margin-top: 40px;
        }

        .cta-box a {
            display: inline-block;
            padding: 14px 28px;
            background: linear-gradient(135deg, #0d6efd, #198754);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s ease;
        }

        .cta-box a:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Informasi SPMB</h1>
        <p>Sistem Penerimaan Murid Baru SMK Provinsi Sumatera Barat</p>
    </div>
</section>

<!-- CONTENT -->
<section class="section">
    <div class="container">

        <div class="info-card">
            <h2>Pengertian SPMB</h2>
            <p>
                Sistem Penerimaan Murid Baru (SPMB) adalah mekanisme resmi
                penerimaan peserta didik baru pada Sekolah Menengah Kejuruan (SMK)
                di Provinsi Sumatera Barat yang dilaksanakan secara transparan,
                objektif, dan akuntabel.
            </p>
        </div>

        <div class="info-card">
            <h2>Jalur Pendaftaran</h2>
            <ul>
                <li>Jalur Afirmasi</li>
                <li>Jalur Prestasi</li>
                <li>Jalur Perpindahan Tugas Orang Tua</li>
                <li>Jalur Reguler</li>
            </ul>
        </div>

        <div class="info-card">
            <h2>Jadwal Penting</h2>
            <ul>
                <li>Pendaftaran Online: Menyesuaikan jadwal Dinas Pendidikan</li>
                <li>Verifikasi Berkas: Setelah pendaftaran</li>
                <li>Pengumuman Hasil Seleksi</li>
                <li>Daftar Ulang</li>
            </ul>
        </div>

        <div class="info-card">
            <h2>Persyaratan Umum</h2>
            <ul>
                <li>Lulusan SMP/MTs atau sederajat</li>
                <li>Memiliki ijazah atau surat keterangan lulus</li>
                <li>Kartu Keluarga</li>
                <li>Akta Kelahiran</li>
                <li>Dokumen pendukung sesuai jalur pendaftaran</li>
            </ul>
        </div>

        <div class="info-card">
            <h2>Alur Pendaftaran</h2>
            <ol>
                <li>Membuat akun pendaftaran</li>
                <li>Login ke sistem SPMB</li>
                <li>Melengkapi biodata</li>
                <li>Memilih SMK dan jurusan</li>
                <li>Submit pendaftaran</li>
                <li>Menunggu hasil seleksi</li>
            </ol>
        </div>

        <div class="cta-box">
            <a href="register.php">Daftar Sekarang</a>
        </div>

    </div>
</section>

<?php include "partials/footer.php"; ?>

</body>
</html>
