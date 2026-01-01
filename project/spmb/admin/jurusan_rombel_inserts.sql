-- Generated jurusan + rombel SQL
-- Verify values before running on production!

-- School: SMK NEGERI 1 PADANG
-- Jurusan: DESAIN PEMODELAN DAN INFORMASI | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PEMODELAN DAN INFORMASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: DESAIN PEMODELAN DAN INFORMASI | Rombel: Rombel 2 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PEMODELAN DAN INFORMASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK KONSTRUKSI DAN PERUMAHAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KONSTRUKSI DAN PERUMAHAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK KONSTRUKSI DAN PERUMAHAN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KONSTRUKSI DAN PERUMAHAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK ELEKTRONIKA | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK ELEKTRONIKA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK ELEKTRONIKA | Rombel: Rombel 2 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK ELEKTRONIKA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK KETENAGALISTRIKAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KETENAGALISTRIKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK MESIN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK MESIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK MESIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK MESIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK MESIN | Rombel: Rombel 2 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK MESIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK MESIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK MESIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK MESIN | Rombel: Rombel 3 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK MESIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK MESIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK MESIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF | Rombel: Rombel 2 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 1 PADANG
-- Jurusan: TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF | Rombel: Rombel 3 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 PADANG' AND j.nama_jurusan = 'TEKNIK PENDINGIN DAN TATA UDARA OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: AKUNTANSI DAN KEUANGAN LEMBAGA | Rombel: Rombel 1 | Kapasitas: 144
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AKUNTANSI DAN KEUANGAN LEMBAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 144 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: BISNIS RETAIL | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BISNIS RETAIL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BISNIS RETAIL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'BISNIS RETAIL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: BISNIS RETAIL | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BISNIS RETAIL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BISNIS RETAIL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'BISNIS RETAIL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 1 | Kapasitas: 72
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 72 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS | Rombel: Rombel 3 | Kapasitas: 38
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 38 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: BISNIS DIGITAL | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BISNIS DIGITAL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BISNIS DIGITAL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'BISNIS DIGITAL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN | Rombel: Rombel 1 | Kapasitas: 72
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 72 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: PENGOLAHAN HASIL PERIKANAN LAUT | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PENGOLAHAN HASIL PERIKANAN LAUT' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PENGOLAHAN HASIL PERIKANAN LAUT');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'PENGOLAHAN HASIL PERIKANAN LAUT'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 2 PADANG
-- Jurusan: AGRIBISNIS PERIKANAN AIR TAWAR | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS PERIKANAN AIR TAWAR' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS PERIKANAN AIR TAWAR');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 2 PADANG' AND j.nama_jurusan = 'AGRIBISNIS PERIKANAN AIR TAWAR'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: AKUNTANSI DAN KEUANGAN LEMBAGA | Rombel: Rombel 1 | Kapasitas: 72
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AKUNTANSI DAN KEUANGAN LEMBAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 72 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: AKUNTANSI DAN KEUANGAN LEMBAGA | Rombel: Rombel 2 | Kapasitas: 72
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AKUNTANSI DAN KEUANGAN LEMBAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 72 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN & LAYANAN BISNIS | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: MANAJEMEN PERKANTORAN & LAYANAN BISNIS | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'MANAJEMEN PERKANTORAN & LAYANAN BISNIS'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: BISNIS DIGITAL | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BISNIS DIGITAL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BISNIS DIGITAL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'BISNIS DIGITAL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 3 PADANG
-- Jurusan: USAHA LAYANAN PARIWISATA | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA LAYANAN PARIWISATA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 3 PADANG' AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: PEMASARAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PEMASARAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PEMASARAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'PEMASARAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: AKUNTANSI DAN KEUANGAN LEMBAGA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AKUNTANSI DAN KEUANGAN LEMBAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: AKUNTANSI DAN KEUANGAN LEMBAGA | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AKUNTANSI DAN KEUANGAN LEMBAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'AKUNTANSI DAN KEUANGAN LEMBAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: DESAIN KOMUNIKASI VISUAL | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN KOMUNIKASI VISUAL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN KOMUNIKASI VISUAL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'DESAIN KOMUNIKASI VISUAL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: DESAIN KOMUNIKASI VISUAL | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN KOMUNIKASI VISUAL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN KOMUNIKASI VISUAL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'DESAIN KOMUNIKASI VISUAL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: ANIMASI | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'ANIMASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'ANIMASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'ANIMASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: SENI RUPA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'SENI RUPA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'SENI RUPA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'SENI RUPA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN) | Rombel: Rombel 1 | Kapasitas: 30
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 30 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN) | Rombel: Rombel 2 | Kapasitas: 30
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 30 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'DESAIN INTERIOR DAN TEKNIK FURNITURE (3 TAHUN)'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 4 PADANG
-- Jurusan: DESAIN PRODUKSI DAN KRIYA | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PRODUKSI DAN KRIYA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PRODUKSI DAN KRIYA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 4 PADANG' AND j.nama_jurusan = 'DESAIN PRODUKSI DAN KRIYA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK KONSTRUKSI DAN PERUMAHAN | Rombel: Rombel 1 | Kapasitas: 31
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KONSTRUKSI DAN PERUMAHAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 31 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: DESAIN PEMODELAN DAN INFORMASI BANGUNAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: DESAIN PEMODELAN DAN INFORMASI BANGUNAN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK MESIN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK MESIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK MESIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK MESIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK MESIN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK MESIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK MESIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK MESIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK OTOMOTIF | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK OTOMOTIF | Rombel: Rombel 2 | Kapasitas: 32
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 32 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK KETENAGALISTRIKAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KETENAGALISTRIKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK KETENAGALISTRIKAN | Rombel: Rombel 2 | Kapasitas: 32
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KETENAGALISTRIKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 32 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK INSTALASI TENAGA LISTRIK | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK INSTALASI TENAGA LISTRIK' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK INSTALASI TENAGA LISTRIK | Rombel: Rombel 2 | Kapasitas: 32
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK INSTALASI TENAGA LISTRIK' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 32 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 5 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 2 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 5 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: TATA BUSANA | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TATA BUSANA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TATA BUSANA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'TATA BUSANA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: TATA BUSANA | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TATA BUSANA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TATA BUSANA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'TATA BUSANA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: TATA BUSANA | Rombel: Rombel 3 | Kapasitas: 40
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TATA BUSANA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TATA BUSANA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 40 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'TATA BUSANA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 3 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 3 | Kapasitas: 42
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 42 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: USAHA LAYANAN PARIWISATA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA LAYANAN PARIWISATA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: USAHA LAYANAN PARIWISATA | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA LAYANAN PARIWISATA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: USAHA LAYANAN PARIWISATA | Rombel: Rombel 3 | Kapasitas: 42
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA LAYANAN PARIWISATA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 42 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'USAHA LAYANAN PARIWISATA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 6 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 6 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: KECANTIKAN DAN SPA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KECANTIKAN DAN SPA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KECANTIKAN DAN SPA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'KECANTIKAN DAN SPA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: KECANTIKAN DAN SPA | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KECANTIKAN DAN SPA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KECANTIKAN DAN SPA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'KECANTIKAN DAN SPA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: SENI PERTUNJUKAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'SENI PERTUNJUKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'SENI PERTUNJUKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'SENI PERTUNJUKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: SENI PERTUNJUKAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'SENI PERTUNJUKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'SENI PERTUNJUKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'SENI PERTUNJUKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: SENI TEATER | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'SENI TEATER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'SENI TEATER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'SENI TEATER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: BROADCASTING DAN PERFILMAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BROADCASTING DAN PERFILMAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BROADCASTING DAN PERFILMAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'BROADCASTING DAN PERFILMAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 7 PADANG
-- Jurusan: BROADCASTING DAN PERFILMAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'BROADCASTING DAN PERFILMAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'BROADCASTING DAN PERFILMAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 7 PADANG' AND j.nama_jurusan = 'BROADCASTING DAN PERFILMAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: TEKNIK OTOMOTIF | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'TEKNIK OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: TEKNIK OTOMOTIF | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK OTOMOTIF' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK OTOMOTIF');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'TEKNIK OTOMOTIF'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: USAHA BUSANA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA BUSANA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA BUSANA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'USAHA BUSANA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: USAHA BUSANA | Rombel: Rombel 2 | Kapasitas: 34
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'USAHA BUSANA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'USAHA BUSANA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 34 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'USAHA BUSANA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: DESAIN PRODUKSI KRIYA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PRODUKSI KRIYA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: DESAIN PRODUKSI KRIYA | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PRODUKSI KRIYA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: DESAIN PRODUKSI KRIYA | Rombel: Rombel 3 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PRODUKSI KRIYA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'DESAIN PRODUKSI KRIYA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: KRIYA KERAJINAN BATIK DAN TEKSTIL | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KRIYA KERAJINAN BATIK DAN TEKSTIL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KRIYA KERAJINAN BATIK DAN TEKSTIL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'KRIYA KERAJINAN BATIK DAN TEKSTIL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: KRIYA KERAJINAN BATIK DAN TEKSTIL | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KRIYA KERAJINAN BATIK DAN TEKSTIL' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KRIYA KERAJINAN BATIK DAN TEKSTIL');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'KRIYA KERAJINAN BATIK DAN TEKSTIL'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: KRIYA KERAJINAN PERALATAAN RUMAH TANGGA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KRIYA KERAJINAN PERALATAAN RUMAH TANGGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KRIYA KERAJINAN PERALATAAN RUMAH TANGGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'KRIYA KERAJINAN PERALATAAN RUMAH TANGGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: KRIYA KERAJINAN KERAMIK | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KRIYA KERAJINAN KERAMIK' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KRIYA KERAJINAN KERAMIK');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'KRIYA KERAJINAN KERAMIK'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 8 PADANG
-- Jurusan: KRIYA KERAJINAN KERAMIK | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KRIYA KERAJINAN KERAMIK' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KRIYA KERAJINAN KERAMIK');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 8 PADANG' AND j.nama_jurusan = 'KRIYA KERAJINAN KERAMIK'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 3 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 3', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 3');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 4 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 4', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 4');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: PERHOTELLAN | Rombel: Rombel 5 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERHOTELLAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERHOTELLAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 5', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'PERHOTELLAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 5');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 9 PADANG
-- Jurusan: KUL INDER | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'KUL INDER' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'KUL INDER');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 9 PADANG' AND j.nama_jurusan = 'KUL INDER'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: PELAYARAN KAPAL PENANGKAP IKAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PELAYARAN KAPAL PENANGKAP IKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PELAYARAN KAPAL PENANGKAP IKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'PELAYARAN KAPAL PENANGKAP IKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: PELAYARAN KAPAL PENANGKAP IKAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PELAYARAN KAPAL PENANGKAP IKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PELAYARAN KAPAL PENANGKAP IKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'PELAYARAN KAPAL PENANGKAP IKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: PELAYARAN KAPAL NIAGA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PELAYARAN KAPAL NIAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PELAYARAN KAPAL NIAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'PELAYARAN KAPAL NIAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: PELAYARAN KAPAL NIAGA | Rombel: Rombel 2 | Kapasitas: 37
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PELAYARAN KAPAL NIAGA' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PELAYARAN KAPAL NIAGA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 37 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'PELAYARAN KAPAL NIAGA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: PERIKANAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'PERIKANAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'PERIKANAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'PERIKANAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 10 PADANG
-- Jurusan: AGRIBISNIS PERIKANAN AIR TAWAR | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS PERIKANAN AIR TAWAR' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS PERIKANAN AIR TAWAR');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 10 PADANG' AND j.nama_jurusan = 'AGRIBISNIS PERIKANAN AIR TAWAR'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: AGRIBISNIS TANAMAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS TANAMAN' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS TANAMAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'AGRIBISNIS TANAMAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: AGRIBISNIS TANAMAN | Rombel: Rombel 2 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS TANAMAN' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS TANAMAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'AGRIBISNIS TANAMAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: HORTIKULTURA | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'HORTIKULTURA' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'HORTIKULTURA');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'HORTIKULTURA'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: AGRIOTEKNOLOGI PENGOLAHAN HASIL PERTANIAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIOTEKNOLOGI PENGOLAHAN HASIL PERTANIAN' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIOTEKNOLOGI PENGOLAHAN HASIL PERTANIAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'AGRIOTEKNOLOGI PENGOLAHAN HASIL PERTANIAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: AGRIBISNIS PERBENIHAN TANAMAN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS PERBENIHAN TANAMAN' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS PERBENIHAN TANAMAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'AGRIBISNIS PERBENIHAN TANAMAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK PERTANIAN PEMBANGUNAN NEGERI PADANG
-- Jurusan: AGRIBISNIS PENGOLAHAN HASIL PERTANIAN | Rombel: Rombel 1 | Kapasitas: 36
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'AGRIBISNIS PENGOLAHAN HASIL PERTANIAN' FROM smk s
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'AGRIBISNIS PENGOLAHAN HASIL PERTANIAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 36 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK PERTANIAN PEMBANGUNAN NEGERI PADANG' AND j.nama_jurusan = 'AGRIBISNIS PENGOLAHAN HASIL PERTANIAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK KONSTRUKSI DAN PERUMAHAN | Rombel: Rombel 1 | Kapasitas: 31
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KONSTRUKSI DAN PERUMAHAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 31 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK KONSTRUKSI DAN PERUMAHAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: DESAIN PEMODELAN DAN INFORMASI BANGUNAN | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'DESAIN PEMODELAN DAN INFORMASI BANGUNAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK ELEKTRONIKA INDUSTRI | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK ELEKTRONIKA INDUSTRI' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA INDUSTRI');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK ELEKTRONIKA INDUSTRI'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK AUDIO VIDEO | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK AUDIO VIDEO' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK AUDIO VIDEO');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK AUDIO VIDEO'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK KETENAGALISTRIKAN | Rombel: Rombel 1 | Kapasitas: 33
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK KETENAGALISTRIKAN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 33 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK KETENAGALISTRIKAN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK INSTALASI TENAGA LISTRIK | Rombel: Rombel 1 | Kapasitas: 69
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK INSTALASI TENAGA LISTRIK' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 69 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK INSTALASI TENAGA LISTRIK'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN | Rombel: Rombel 1 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 1', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 1');

-- School: SMK NEGERI 1 SUMATERA BARAT
-- Jurusan: TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN | Rombel: Rombel 2 | Kapasitas: 35
INSERT INTO jurusan (id_smk, nama_jurusan)
SELECT s.id_smk, 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN' FROM smk s
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT'
  AND NOT EXISTS (SELECT 1 FROM jurusan j WHERE j.id_smk = s.id_smk AND j.nama_jurusan = 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN');

INSERT INTO rombel (id_jurusan, nama_rombel, kapasitas)
SELECT j.id_jurusan, 'Rombel 2', 35 FROM jurusan j
JOIN smk s ON j.id_smk = s.id_smk
WHERE s.nama_smk = 'SMK NEGERI 1 SUMATERA BARAT' AND j.nama_jurusan = 'TEKNIK PEMASANAN TATA UDARA DAN PENDINGIN'
  AND NOT EXISTS (SELECT 1 FROM rombel r WHERE r.id_jurusan = j.id_jurusan AND r.nama_rombel = 'Rombel 2');

