<style>
/* ===== FOOTER ===== */
.footer {
    background: linear-gradient(135deg, #0d6efd, #198754);
    color: #fff;
    text-align: center;
    padding: 30px 20px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    font-size: 14px;
    line-height: 1.6;
    box-shadow: 0 -6px 18px rgba(0,0,0,0.08);
    animation: fadeUp 1s ease forwards;
}

.footer p {
    margin: 0;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 480px) {
    .footer {
        font-size: 13px;
        padding: 20px 15px;
    }
}
</style>

<div class="footer">
    <p>
        © <?= date("Y"); ?> Dinas Pendidikan Provinsi Sumatera Barat<br>
        SPMB SMK – Sistem Informasi Publik
    </p>
</div>
