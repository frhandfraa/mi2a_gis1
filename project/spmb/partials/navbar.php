<style>
/* ===== NAVBAR ===== */
.navbar {
    background-color: #ffffff;
    padding: 10px 25px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    border-radius: 0 0 20px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
}

/* ===== LOGO DAN TEKS ===== */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.navbar-brand img {
    height: 50px;
    border-radius: 8px;
}

.navbar-brand .brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.navbar-brand .brand-text .gov {
    font-weight: 700;
    color: #0d6efd;
    font-size: 16px;
}

.navbar-brand .brand-text .disdik {
    font-weight: 500;
    color: #198754;
    font-size: 14px;
}

/* ===== MENU ===== */
.navbar-menu {
    display: flex;
    gap: 20px;
    align-items: center;
}

.navbar-menu li {
    position: relative;
    list-style: none;
}

.navbar-menu li a {
    text-decoration: none;
    color: #0d6efd;
    padding: 8px 12px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.navbar-menu li a:hover {
    background-color: rgba(13, 110, 253, 0.1);
    transform: translateY(-2px);
}

/* ===== DROPDOWN ===== */
.navbar-menu li .dropdown {
    display: none;
    position: absolute;
    top: 40px;
    left: 0;
    background-color: #fff;
    min-width: 160px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 99;
}

.navbar-menu li .dropdown a {
    display: block;
    padding: 10px 15px;
    color: #0d6efd;
    font-weight: 500;
}

.navbar-menu li:hover .dropdown {
    display: block;
    opacity: 1;
    visibility: visible;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .navbar-menu {
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }
}

@media(max-width: 480px) {
    .navbar-brand .brand-text .gov { font-size: 14px; }
    .navbar-brand .brand-text .disdik { font-size: 12px; }
    .navbar-menu li a { padding: 6px 10px; font-size: 14px; }
}
</style>

<div class="navbar">
    <div class="navbar-brand">
        <img src="assets/img/logo_sumbar.png" alt="Logo Sumbar">
        <img src="assets/img/logo_disdik.png" alt="Logo Disdik">
        <div class="brand-text">
            <span class="gov">Pemerintah Provinsi Sumatera Barat</span>
            <span class="disdik">Dinas Pendidikan Provinsi Sumatera Barat</span>
        </div>
    </div>

    <ul class="navbar-menu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="daftar_smk.php">Daftar SMK</a></li>
        <li><a href="peta_smk.php">Peta SMK</a></li>
        <li><a href="info_spmb.php">Informasi SPMB</a></li>
        <li>
            <a href="#">Daftar &#9662;</a>
            <div class="dropdown">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </div>
        </li>
    </ul>
</div>
