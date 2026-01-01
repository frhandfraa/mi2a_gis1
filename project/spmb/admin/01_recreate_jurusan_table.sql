-- Recreate `jurusan` table
-- Run this AFTER you have dropped or backed up any existing `jurusan` table.

DROP TABLE IF EXISTS jurusan;

CREATE TABLE jurusan (
  id_jurusan INT AUTO_INCREMENT PRIMARY KEY,
  id_smk INT NOT NULL,
  nama_jurusan VARCHAR(150) NOT NULL,
  jumlah_rombel INT DEFAULT 0,
  kapasitas_total INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_jurusan_smk FOREIGN KEY (id_smk) REFERENCES smk(id_smk) ON DELETE CASCADE,
  UNIQUE KEY uk_jurusan_smk_nama (id_smk, nama_jurusan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Verification: show recently created table structure
-- DESCRIBE jurusan;
