<?php 
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/auth.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Peta Lokasi Sekolah</title>
<script src="https://cdn.tailwindcss.com"></script>

<!-- LEAFLET -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- GEOCODER -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css">
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<!-- EASY BUTTON -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

<script src="https://kit.fontawesome.com/a2e0e6cfcd.js" crossorigin="anonymous"></script>

<style>
#map { height: calc(100vh - 150px); width: 100%; }

/* Sidebar detail sekolah */
#detailSidebar {
    position: fixed;
    top: 0;
    right: -350px;
    width: 320px;
    height: 100vh;
    background: #ffffff;
    padding: 20px;
    box-shadow: -4px 0 18px rgba(0,0,0,0.25);
    transition: right .35s ease;
    z-index: 999999;
    overflow-y: auto;
    border-radius: 12px 0 0 12px;
}

#detailSidebar.active { right: 0; }

#detailSidebar img { width: 100%; border-radius: 10px; }

.detail-label { font-weight: bold; color:#222; }
</style>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-600 via-blue-800 to-indigo-900 text-white flex">

    <!-- SIDEBAR ADMIN -->
    <aside class="w-72 bg-white/10 backdrop-blur-xl border-r border-white/20 
       p-6 flex flex-col shadow-2xl">
        <h3 class="text-2xl font-bold mb-1">
            Admin<span class="text-sky-300">GIS</span>
        </h3>

        <p class="text-white/70 text-sm mb-6">
            <?= htmlspecialchars($_SESSION['admin_nama'] ?? $_SESSION['admin_username']) ?>
        </p>

        <nav class="space-y-2">

            <a href="dashboard.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">
               📊 Dashboard
            </a>

            <a href="sekolah_list.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">
               🏫 Kelola Sekolah
            </a>

            <a href="sekolah_add.php" class="block py-2.5 px-4 rounded-xl hover:bg-white/20">
               ➕ Tambah Sekolah
            </a>

            <a href="peta_admin.php" 
               class="block py-2.5 px-4 rounded-xl bg-white/20 shadow-inner">
               🗺️ Lihat Peta
            </a>

            <a href="logout.php"
               class="block py-2.5 px-4 rounded-xl bg-red-600/30 hover:bg-red-700/40 mt-10">
               🚪 Logout
            </a>

        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-10 overflow-y-auto">
        <h1 class="text-4xl font-bold mb-8">
            Peta Lokasi <span class="text-sky-300">Sekolah</span>
        </h1>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 shadow-xl border border-white/20">
            <div id="map" class="rounded-xl overflow-hidden"></div>
        </div>
    </main>

    <!-- SIDEBAR DETAIL SEKOLAH (kanan) -->
    <div id="detailSidebar" class="text-black">
        <span id="closeDetail" style="cursor:pointer;font-size:22px; position:absolute; top:10px; right:15px;">×</span>

        <h2 id="ds_nama" class="text-xl font-bold text-blue-700"></h2>
        <img id="ds_foto" src="">
        <p><span class="detail-label">Alamat:</span> <span id="ds_alamat"></span></p>
        <p><span class="detail-label">Zona:</span> <span id="ds_zona"></span></p>
        <p><span class="detail-label">Status:</span> <span id="ds_status"></span></p>
    </div>

<script>
/* INIT MAP */
const map = L.map('map').setView([-0.9471, 100.4172], 13);

/* BASEMAP */
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

/* ICON SEKOLAH */
const iconSekolah = L.icon({
  iconUrl: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
  iconSize: [38, 38],
  iconAnchor: [19, 38],
});

/* SIDEBAR */
const sidebar = document.getElementById("detailSidebar");
document.getElementById("closeDetail").onclick = () =>
    sidebar.classList.remove("active");

/* AMBIL DATA SEKOLAH */
let bounds = [];

fetch("/mi2a_gis/project/get_data.php")
  .then(r => r.json())
  .then(data => {

      console.log("DATA SEKOLAH:", data);

      if (!data.length) {
          alert("Data sekolah kosong!");
          return;
      }

      data.forEach(s => {

          const lat = parseFloat(s.latitude);
          const lng = parseFloat(s.longitude);

          if (isNaN(lat) || isNaN(lng)) {
              console.warn("KOORDINAT TIDAK VALID:", s);
              return;
          }

          const marker = L.marker([lat, lng], {
              icon: iconSekolah
          }).addTo(map);

          marker.on("click", () => tampilkanDetail(s));

          bounds.push([lat, lng]);
      });

      // AUTO ZOOM KE SEMUA SEKOLAH
      if (bounds.length > 0) {
          map.fitBounds(bounds, { padding: [50, 50] });
      }
  })
  .catch(err => {
      console.error("FETCH ERROR:", err);
      alert("Gagal load data sekolah");
  });

/* DETAIL SIDEBAR */
function tampilkanDetail(s) {
    console.log("DATA MASUK KE SIDEBAR:", s);
    sidebar.classList.add("active");

    document.getElementById("ds_nama").innerText =
        s.nama_smk ?? "-";

    document.getElementById("ds_alamat").innerText =
        s.alamat ?? "-";

    document.getElementById("ds_zona").innerText =
        s.zona ?? "-";

    document.getElementById("ds_status").innerText =
        s.status ?? "-";

    document.getElementById("ds_foto").src = s.foto
    ? s.foto
    : "https://via.placeholder.com/350x200?text=Foto+Sekolah";


}

</script>


</body>
</html>
