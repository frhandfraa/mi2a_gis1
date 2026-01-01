-- Update jumlah_rombel and kapasitas_total counters
-- Run this AFTER jurusan_rombel_inserts.sql completes successfully

UPDATE jurusan j
SET j.jumlah_rombel = (SELECT COUNT(*) FROM rombel WHERE id_jurusan = j.id_jurusan),
    j.kapasitas_total = (SELECT COALESCE(SUM(kapasitas), 0) FROM rombel WHERE id_jurusan = j.id_jurusan)
WHERE j.id_jurusan IN (SELECT DISTINCT id_jurusan FROM rombel);

-- Verification
-- SELECT j.id_jurusan, j.nama_jurusan, j.jumlah_rombel, j.kapasitas_total FROM jurusan j LIMIT 20;
