<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPMB SMK Sumatera Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
</head>
<body>

<div class="header">
    <h1>SPMB SMK Sumatera Barat</h1>
    <p>Sistem Penerimaan Murid Baru Jenjang SMK</p>
</div>

<style>
/* ===== GLOBAL ===== */
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #f0f4f8;
    color: #333;
    scroll-behavior: smooth;
}

/* ===== HEADER ===== */
.header {
    background: linear-gradient(135deg, #0d6efd, #198754);
    color: #fff;
    text-align: center;
    padding: 80px 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    animation: fadeUp 1s ease forwards;
}

.header h1 {
    margin: 0 0 15px;
    font-size: 38px;
    font-weight: 700;
    line-height: 1.2;
}

.header p {
    margin: 0;
    font-size: 18px;
    opacity: 0.95;
}

/* ===== ANIMASI FADE UP ===== */
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    .header h1 { font-size: 32px; }
    .header p { font-size: 16px; }
    .header { padding: 60px 15px; }
}

@media(max-width: 480px) {
    .header h1 { font-size: 28px; }
    .header p { font-size: 15px; }
    .header { padding: 50px 10px; }
}
</style>

