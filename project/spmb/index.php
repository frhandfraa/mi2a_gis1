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

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, #0d6efd, #198754);
            color: #fff;
            padding: 80px 20px;
        }

        .hero-container {
            max-width: 1140px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .hero-buttons {
            margin-top: 30px;
        }

        .hero-buttons a {
            display: inline-block;
            padding: 14px 26px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            margin-right: 12px;
        }

        .btn-primary {
            background: #ffffff;
            color: #0d6efd;
        }

        .btn-primary:hover {
            background: #e9ecef;
        }

        .btn-outline {
            border: 2px solid #fff;
            color: #fff;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,0.15);
        }

        /* ===== SECTION ===== */
        .section {
            padding: 60px 20px;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 28px;
            color: #0d6efd;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #555;
        }

        /* ===== CARD ===== */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin-top: 0;
            color: #198754;
            font-size: 20px;
        }

        .card p {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
        }

        /* ===== CTA ===== */
        .cta {
            background: #ffffff;
            text-align: center;
            padding: 60px 20px;
        }

        .cta h2 {
            font-size: 26px;
            color: #0d6efd;
        }

        .cta p {
            color: #555;
            margin: 15px 0 30px;
        }

        .cta a {
            background: #0d6efd;
            color: white;
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .cta a:hover {
            background: #0b5ed7;
        }

        @media(max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<?php include "partials/navbar.php"; ?>

<!-- HERO -->
<section class="hero">
    <div class="hero-container">
        <div>
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
                <p>
                    Pendaftaran SMK tidak menggunakan sistem zonasi.
                    Calon peserta didik dapat memilih SMK sesuai minat
                    dan kompetensi keahlian.
                </p>
            </div>

            <div class="card">
                <h3>Berbasis Online</h3>
                <p>
                    Seluruh proses pendaftaran dilakukan secara daring
                    melalui sistem SPMB resmi Provinsi Sumatera Barat.
                </p>
            </div>

            <div class="card">
                <h3>Pemetaan SMK</h3>
                <p>
                    Informasi lokasi SMK ditampilkan berbasis peta untuk
                    memudahkan calon peserta didik dalam menentukan pilihan.
                </p>
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

</body>
</html>
