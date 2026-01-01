-- Create rombel and siswa tables for jurusan management
-- Run this BEFORE running jurusan_rombel_inserts.sql

-- ============================================
-- 1. Alter jurusan table (add count columns)
-- ============================================
ALTER TABLE jurusan 
ADD COLUMN IF NOT EXISTS jumlah_rombel INT DEFAULT 0,
ADD COLUMN IF NOT EXISTS kapasitas_total INT DEFAULT 0;

-- ============================================
-- 2. Create rombel table (NO TRIGGERS - will update separately)
-- ============================================
CREATE TABLE IF NOT EXISTS rombel (
  id_rombel INT AUTO_INCREMENT PRIMARY KEY,
  id_jurusan INT NOT NULL,
  nama_rombel VARCHAR(50) NOT NULL,
  kapasitas INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_jurusan) REFERENCES jurusan(id_jurusan) ON DELETE CASCADE,
  UNIQUE KEY uk_rombel_jurusan (id_jurusan, nama_rombel)
);

-- ============================================
-- 3. Create siswa table
-- ============================================
CREATE TABLE IF NOT EXISTS siswa (
  id_siswa INT AUTO_INCREMENT PRIMARY KEY,
  id_rombel INT NOT NULL,
  no_pendaftaran VARCHAR(20) UNIQUE,
  nama_siswa VARCHAR(100) NOT NULL,
  nisn VARCHAR(10),
  jenis_kelamin ENUM('L', 'P') DEFAULT 'L',
  tanggal_lahir DATE,
  alamat TEXT,
  no_telepon VARCHAR(15),
  status_penerimaan ENUM('diterima', 'tidak_diterima', 'menunggu') DEFAULT 'menunggu',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_rombel) REFERENCES rombel(id_rombel) ON DELETE CASCADE
);

-- ============================================
-- Notes
-- ============================================
-- After inserts are done, run 02_update_jurusan_counts.sql to populate jumlah_rombel and kapasitas_total
