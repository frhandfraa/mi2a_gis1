<style>
/* Navbar dasar */
.navbar {
    background-color: #ffffff; /* putih */
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 15px;
    align-items: center;
}

.navbar ul li {
    position: relative;
}

.navbar ul li a {
    text-decoration: none;
    color: #1E90FF; /* biru dinas */
    padding: 8px 12px;
    display: block;
    font-weight: bold;
    border-radius: 5px;
}

.navbar ul li a:hover {
    background-color: #e0f0ff; /* hover ringan */
}

/* Submenu dropdown */
.navbar ul li .dropdown {
    display: none;
    position: absolute;
    top: 38px;
    left: 0;
    background-color: #ffffff;
    min-width: 150px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    border-radius: 5px;
    z-index: 99;
}

.navbar ul li .dropdown a {
    padding: 8px 12px;
    color: #1E90FF;
    font-weight: normal;
}

.navbar ul li:hover .dropdown {
    display: block;
}
</style>

<div class="navbar">
    <ul>
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
