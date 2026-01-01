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
            background: #f0f4f8;
            color: #333;
            scroll-behavior: smooth;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #198754);
            color: #fff;
            padding: 50px 20px;
            animation: fadeUp 0.8s ease forwards;
        }

        .page-header .container {
            max-width: 1140px;
            margin: auto;
        }

        .page-header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }

        .page-header p {
            margin-top: 10px;
            opacity: 0.95;
            font-size: 16px;
        }

        .section {
            padding: 50px 20px;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        /* ===== INFO CARD ===== */
        .info-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.06);
            animation: fadeUp 1s ease forwards;
        }

        .info-card h2 {
            margin-top: 0;
            color: #0d6efd;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .info-card ul,
        .info-card ol {
            padding-left: 20px;
        }

        .info-card ul li,
        .info-card ol li {
            margin-bottom: 10px;
            font-size: 15px;
            color: #555;
        }

        /* ===== CTA BUTTON ===== */
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
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            animation: fadeUp 1s ease forwards;
        }

        .cta-box a:hover {
            opacity: 0.9;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        /* ===== ANIMASI FADE UP ===== */
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width: 768px) {
            .page-header h1 { font-size: 28px; }
            .info-card h2 { font-size: 22px; }
            .info-card ul li,
            .info-card ol li { font-size: 14px; }
        }

        @media(max-width: 480px) {
            .page-header h1 { font-size: 24px; }
            .info-card h2 { font-size: 20px; }
            .info-card ul li,
            .info-card ol li { font-size: 13px; }
            .cta-box a { padding: 12px 24px; font-size: 14px; }
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
