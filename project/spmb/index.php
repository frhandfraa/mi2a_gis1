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

<style>
    /* ===== GLOBAL ===== */
    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background: #f0f4f8;
        color: #333;
        scroll-behavior: smooth;
    }

    a {
        transition: all 0.3s ease;
    }

    /* ===== ANIMASI ===== */
    @keyframes fadeUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-8px); }
        60% { transform: translateY(-4px); }
    }

    /* ===== HERO ===== */
    .hero {
        background: linear-gradient(135deg, #6c5ce7, #00b894);
        color: #fff;
        padding: 100px 20px;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
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
        font-size: 44px;
        margin-bottom: 20px;
        font-weight: 800;
        line-height: 1.2;
        text-shadow: 1px 1px 8px rgba(0,0,0,0.2);
        animation: fadeUp 1s ease forwards;
    }

    .hero p {
        font-size: 18px;
        line-height: 1.8;
        opacity: 0.9;
        animation: fadeUp 1.2s ease forwards;
    }

    .hero-buttons a {
        display: inline-block;
        padding: 16px 32px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        margin-right: 14px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        transition: all 0.4s ease;
        animation: fadeUp 1.4s ease forwards;
    }

    .btn-primary {
        background: #fff;
        color: #6c5ce7;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .btn-outline {
        border: 2px solid #fff;
        color: #fff;
    }

    .btn-outline:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-3px);
    }

    /* ===== SECTION ===== */
    .section {
        padding: 80px 20px;
    }

    .container {
        max-width: 1140px;
        margin: auto;
    }

    .section-title {
        text-align: center;
        margin-bottom: 60px;
        animation: fadeIn 1s ease forwards;
    }

    .section-title h2 {
        font-size: 32px;
        color: #6c5ce7;
        margin-bottom: 12px;
        position: relative;
    }

    .section-title h2::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #00b894;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .section-title p {
        color: #555;
        font-size: 16px;
    }

    /* ===== CARD ===== */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .card {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.06);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 1s ease forwards;
        animation-delay: 0.3s;
    }

    .card:nth-child(1) { animation-delay: 0.3s; }
    .card:nth-child(2) { animation-delay: 0.5s; }
    .card:nth-child(3) { animation-delay: 0.7s; }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.1);
    }

    .card h3 {
        margin-top: 0;
        color: #00b894;
        font-size: 22px;
        margin-bottom: 12px;
    }

    .card p {
        font-size: 15px;
        line-height: 1.7;
        color: #555;
    }

    /* ===== CTA ===== */
    .cta {
        background: #fff;
        text-align: center;
        padding: 80px 20px;
        border-radius: 20px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.05);
        margin: 60px 20px;
        transition: transform 0.4s ease;
        animation: fadeUp 1s ease forwards;
    }

    .cta:hover {
        transform: translateY(-5px);
    }

    .cta h2 {
        font-size: 28px;
        color: #6c5ce7;
    }

    .cta p {
        color: #555;
        margin: 20px 0 30px;
        font-size: 17px;
    }

    .cta a {
        background: #6c5ce7;
        color: white;
        padding: 16px 36px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        animation: bounce 2s infinite;
    }

    .cta a:hover {
        background: #5a4bd7;
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        animation: none;
    }

    /* ===== RESPONSIVE ===== */
    @media(max-width: 768px) {
        .hero-container {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero h1 {
            font-size: 36px;
        }

        .section-title h2 {
            font-size: 26px;
        }

        .cta h2 {
            font-size: 24px;
        }
    }

    @media(max-width: 480px) {
        .hero h1 {
            font-size: 28px;
        }

        .hero p, .section-title p, .card p, .cta p {
            font-size: 15px;
        }
    }
</style>
