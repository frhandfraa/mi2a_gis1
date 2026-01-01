<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta Sekolah Interaktif</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      overflow: hidden;
    }
    #map {
      height: 100vh;
      width: 100%;
    }
    .leaflet-popup-content {
      font-size: 14px;
      line-height: 1.4;
    }
    .popup-card {
      padding: 5px;
      border-radius: 8px;
    }
    .popup-card h4 {
      margin: 0;
      color: #2b5bd9;
    }
    .popup-card small {
      color: gray;
    }

    #sidebar {
      position: fixed;
      top: 0;
      left: -400px;
      width: 250px;
      height: 100vh;
      background: #ffffff;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
      transition: left 0.4s ease;
      z-index: 1200; 
      overflow-y: auto;
      padding: 20px;
    }

    #sidebar.active {
      left: 0;
    }

    #sidebar h3 {
      margin-top: 0;
      color: #2b5bd9;
    }

    #closeSidebar {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      cursor: pointer;
      color: #444;
    }

    #schoolImage {
      width: 100%;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .detail-label {
      font-weight: bold;
      color: #333;
    }

    .leaflet-bottom.leaflet-left {
      left: 10px;
      bottom: 10px;
    }

    .leaflet-control-layers {
      margin-left: 10px;
      margin-bottom: 50px; 
    }

    .leaflet-control {
      z-index: 1100;
    }
  </style>
</head>
<body>

  <div id="sidebar">
    <span id="closeSidebar">&times;</span>
    <h3 id="schoolName">Detail Sekolah</h3>
    <img id="schoolImage" src="https://via.placeholder.com/300x180?text=Foto+Sekolah" alt="Foto Sekolah">
    <p><span class="detail-label">Alamat:</span> <span id="schoolAlamat">-</span></p>
    <p><span class="detail-label">Zona:</span> <span id="schoolZona">-</span></p>
    <p><span class="detail-label">Status:</span> <span id="schoolStatus">-</span></p>
  </div>

  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
  <script src="https://kit.fontawesome.com/a2e0e6cfcd.js" crossorigin="anonymous"></script>

<script>
const map = L.map('map').setView([-0.9471, 100.4172], 13);

// Basemap
const baseMaps = {
  "🗺️ Street": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19, attribution: '&copy; OpenStreetMap contributors'
  }),
  "🌎 Satellite": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy; Esri, Maxar, Earthstar Geographics'
  }),
  "🌃 Dark Mode": L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; CartoDB'
  }),
  "⛰️ Terrain": L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenTopoMap'
  })
};
baseMaps["🗺️ Street"].addTo(map);
L.control.layers(baseMaps, null, { position: 'bottomleft' }).addTo(map);
L.Control.geocoder({ defaultMarkGeocode: true, position: 'topright' }).addTo(map);

// Ikon sekolah
const iconSekolah = L.icon({
  iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
  iconSize: [38, 38],
  iconAnchor: [19, 38],
  popupAnchor: [0, -35]
});

const sidebar = document.getElementById('sidebar');
const closeSidebar = document.getElementById('closeSidebar');
closeSidebar.addEventListener('click', () => sidebar.classList.remove('active'));

// Fungsi helper untuk path foto
function getFotoPath(foto) {
  if (!foto) return "https://via.placeholder.com/300x180?text=Foto+Sekolah";
  return "admin/" + foto; // sesuaikan dengan struktur foldermu
}

// Fungsi tampil detail di sidebar
function tampilkanDetail(school) {
  sidebar.classList.add('active');
  document.getElementById('schoolName').innerText = school.nama_smk;
  document.getElementById('schoolAlamat').innerText = school.alamat || '-';
  document.getElementById('schoolZona').innerText = school.zona || '-';
  document.getElementById('schoolStatus').innerText = school.status || '-';
  document.getElementById('schoolImage').src = getFotoPath(school.foto);
}

// Ambil data sekolah
fetch('get_data.php')
  .then(res => res.json())
  .then(data => {
    data.forEach((school, index) => {
      const marker = L.marker([school.latitude, school.longitude], { icon: iconSekolah }).addTo(map);
      // Gunakan event listener, jangan langsung pakai onclick JSON di HTML
      marker.bindPopup(`
        <div class="popup-card">
          <h4>${school.nama_smk}</h4>
          <small>${school.alamat}</small><br>
          Zona: ${school.zona}<br>
          <button id="btnDetail${index}">Lihat Detail</button>
        </div>
      `);

      marker.on('popupopen', () => {
        document.getElementById(`btnDetail${index}`).onclick = () => tampilkanDetail(school);
      });
    });
  })
  .catch(err => console.error('Gagal ambil data:', err));
</script>

</body>
</html>
