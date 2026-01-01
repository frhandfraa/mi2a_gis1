<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPMB SMK Sumatera Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f0f4f8;
            color: #333;
            scroll-behavior: smooth;
        }

        a { transition: all 0.3s ease; }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            background-image: url('assets/img/siswa_smk1.jpg'); /* pastikan path sesuai lokasi index.php */
            background-size: cover;
            background-position: center;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            top:0; left:0;
            width:100%;
            height:100%;
            background-color: rgba(0,0,0,0.45); /* overlay gelap */
        }

        .hero-container {
            position: relative;
            color: #fff;
            text-align: center;
            z-index: 2;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 44px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .hero-buttons a {
            display: inline-block;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            margin: 0 10px;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        }

        .btn-primary { background: #6c5ce7; color: #fff; }
        .btn-primary:hover { background: #5a4bd7; }

        .btn-outline { border: 2px solid #fff; color: #fff; }
        .btn-outline:hover { background: rgba(255,255,255,0.2); }

        /* ===== SECTION ===== */
        .section { padding: 80px 20px; }
        .container { max-width: 1140px; margin:auto; }

        .section-title { text-align:center; margin-bottom:60px; }
        .section-title h2 {
            font-size: 32px;
            color: #6c5ce7;
            margin-bottom: 12px;
            position: relative;
        }
        .section-title h2::after {
            content:'';
            display:block;
            width:60px;
            height:4px;
            background:#00b894;
            margin:10px auto 0;
            border-radius:2px;
        }
        .section-title p { color:#555; font-size:16px; }

        /* ===== CARD ===== */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap:30px;
        }

        .card {
            background:#fff;
            border-radius:20px;
            padding:30px;
            box-shadow:0 12px 28px rgba(0,0,0,0.06);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow:0 18px 40px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-top:0;
            color:#00b894;
            font-size:22px;
            margin-bottom:12px;
        }

        .card p { font-size:15px; line-height:1.7; color:#555; }

        /* ===== CTA ===== */
        .cta {
            background:#fff;
            text-align:center;
            padding:80px 20px;
            border-radius:20px;
            box-shadow:0 12px 28px rgba(0,0,0,0.05);
            margin:60px 20px;
            transition: transform 0.4s ease;
        }

        .cta:hover { transform: translateY(-5px); }

        .cta h2 { font-size:28px; color:#6c5ce7; }
        .cta p { color:#555; margin:20px 0 30px; font-size:17px; }

        .cta a {
            background:#6c5ce7;
            color:white;
            padding:16px 36px;
            border-radius:50px;
            text-decoration:none;
            font-weight:600;
            box-shadow:0 8px 20px rgba(0,0,0,0.12);
        }

        .cta a:hover { background:#5a4bd7; transform:translateY(-3px); box-shadow:0 12px 25px rgba(0,0,0,0.15); }

        /* ===== RESPONSIVE ===== */
        @media(max-width:768px) {
            .hero h1 { font-size:36px; }
            .section-title h2 { font-size:26px; }
            .cta h2 { font-size:24px; }
        }

        @media(max-width:480px) {
            .hero h1 { font-size:28px; }
            .hero p, .section-title p, .card p, .cta p { font-size:15px; }
        }
    </style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<!-- HERO -->
<section class="hero">
    <div class="hero-container">
        <h1>SPMB SMK Sumatera Barat</h1>
        <p>
            Sistem Penerimaan Murid Baru (SPMB) jenjang Sekolah Menengah Kejuruan
            Provinsi Sumatera Barat. Proses seleksi dilakukan secara transparan,
            objektif, dan tanpa zonasi.
        </p>
        <div class="hero-buttons">
            <a href="register.php" class="btn-primary">Daftar Sekarang</a>
            <a href="login.php" class="btn-outline">Login</a>
        </div>
    </div>
</section>

<!-- INFORMASI -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Informasi SPMB SMK</h2>
            <p>Ketentuan dan tahapan penerimaan peserta didik baru</p>
        </div>

        <div class="card-grid">
            <div class="card">
                <h3>Tanpa Zonasi</h3>
                <p>Pendaftaran SMK tidak menggunakan sistem zonasi. Calon peserta didik dapat memilih SMK sesuai minat dan kompetensi keahlian.</p>
            </div>
            <div class="card">
                <h3>Berbasis Online</h3>
                <p>Seluruh proses pendaftaran dilakukan secara daring melalui sistem SPMB resmi Provinsi Sumatera Barat.</p>
            </div>
            <div class="card">
                <h3>Pemetaan SMK</h3>
                <p>Informasi lokasi SMK ditampilkan berbasis peta untuk memudahkan calon peserta didik dalam menentukan pilihan.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <h2>Siap Melanjutkan ke SMK?</h2>
    <p>Segera lakukan pendaftaran dan pilih SMK terbaik sesuai minat Anda.</p>
    <a href="register.php">Mulai Pendaftaran</a>
</section>

<?php include "partials/footer.php"; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
