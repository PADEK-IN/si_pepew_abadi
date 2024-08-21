CREATE DATABASE db_samudera_abadi;

USE db_samudera_abadi;

-- Tabel users
CREATE TABLE users (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'pelanggan') NOT NULL DEFAULT 'pelanggan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel admin
CREATE TABLE admin (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    nama VARCHAR(30) NOT NULL,
    jenis_kelamin ENUM('laki-laki', 'perempuan') NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL,
    foto VARCHAR(50),
    isValid BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES users(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel pelanggan
CREATE TABLE pelanggan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin ENUM('laki-laki', 'perempuan') NOT NULL,
    alamat VARCHAR(150) NOT NULL,
    kota VARCHAR(25),
    kode_pos VARCHAR(5),
    pekerjaan VARCHAR(20),
    perusahaan VARCHAR(25),
    npwp VARCHAR(16),
    no_telp VARCHAR(15) NOT NULL,
    foto VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES users(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel kategori
CREATE TABLE kategori (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel barang
CREATE TABLE barang (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT(5) NOT NULL,
    nama VARCHAR(70) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(50),
    berat INT(11),
    satuan VARCHAR(10) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT(11) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel keranjang
CREATE TABLE keranjang (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(5) NOT NULL,
    id_barang INT(5) NOT NULL,
    jumlah INT(5) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_barang) REFERENCES barang(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel pesanan
CREATE TABLE pesanan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT(5) NOT NULL,
    metode_kirim ENUM('diantar', 'dijemput') NOT NULL,
    ongkir DECIMAL(10,2) DEFAULT 0,
    ppn DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(20,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel order_items
CREATE TABLE pesanan_items (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    id_barang INT(5) NOT NULL,
    jumlah INT(7) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_barang) REFERENCES barang(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel tagihan
CREATE TABLE tagihan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    metode_bayar ENUM('cod', 'transfer') NOT NULL,
    jumlah_bayar VARCHAR(30) NOT NULL,
    bukti_bayar VARCHAR(255),
    status ENUM('lunas', 'tertunda', 'batal') DEFAULT 'tertunda' NOT NULL,
    isValid BOOLEAN DEFAULT 0 NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel pengiriman
CREATE TABLE pengiriman (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    tanggal DATE NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    bukti VARCHAR(50),
    status ENUM('terkirim', 'diperjalanan', 'diproses') DEFAULT 'diproses',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'pelanggan@gmail.com', '$2y$10$euWv0g6N/XYDTWLrj3hCV.WjfqiCL4E2X4J.LSyhCQwTMuwGnCvRm', 'pelanggan', '2024-08-04 07:39:26'),
(2, 'admin@gmail.com', '$2y$10$euWv0g6N/XYDTWLrj3hCV.WjfqiCL4E2X4J.LSyhCQwTMuwGnCvRm', 'admin', '2024-08-04 07:39:26'),
(3, 'pelanggan2@gmail.com', '$2y$10$5y1KTE23a2HwQcnL16rrP.9PbKj.JdVzlT78SbS7nZL5NPW/RBGte', 'pelanggan', '2024-08-04 12:06:35'),
(4, 'pelanggan3@gmail.com', '$2y$10$Ytz948MI0fpzSPfkR1aFq.jZVUJZHbjR7X8PK3BOTrAp26IOy9DAO', 'pelanggan', '2024-08-04 12:19:26'),
(5, 'admin2@gmail.com', '$2y$10$uBpn9yv69e4CKQ7PME0fTeOq.Sh0pnTog1ciWH7JU.ik4/g3P6Pki', 'admin', '2024-08-04 14:59:14');

INSERT INTO `admin` (`id`, `email`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `foto`, `isValid`, `created_at`) VALUES
(1, 'admin@gmail.com', 'Admin', 'laki-laki', 'Jl. Jalan Aja', '+6281234567890', 'user.png', 1, '2024-08-04 07:39:26'),
(2, 'admin2@gmail.com', 'Admin 2', 'laki-laki', 'Jl. Jalan', '6281234567890', 'user.png', 1, '2024-08-04 14:59:14');

INSERT INTO `pelanggan` (`id`, `email`, `nama`, `jenis_kelamin`, `alamat`, `kota`, `kode_pos`, `pekerjaan`, `perusahaan`, `npwp`, `no_telp`, `foto`, `created_at`) VALUES
(1, 'pelanggan@gmail.com', 'Pelanggans', 'laki-laki', 'Jl. Jalan Aja', 'Jambi', '36216', 'Supir', 'PT. PT an', '', '+6281234567890', 'user.png', '2024-08-04 07:39:26'),
(2, 'pelanggan2@gmail.com', 'Fulanah', 'perempuan', 'Jl. Jalan', NULL, NULL, NULL, NULL, NULL, '+6281234567890', NULL, '2024-08-04 12:06:35'),
(3, 'pelanggan3@gmail.com', 'Fulan', 'laki-laki', 'Jl. Jalan', NULL, NULL, NULL, NULL, NULL, '+6281234567890', 'user.png', '2024-08-04 12:19:26');

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Prill'),
(4, 'Kristal'),
(5, 'Herbisida'),
(6, 'Alat Pertanian');

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `deskripsi`, `gambar`, `berat`, `satuan`, `harga`, `stok`, `created_at`) VALUES
(5, 1, 'CPN 15-0-14/KNO3 Merah 2Kg', 'Pupuk Kalium (Potassium) Nitrat yang diformulasikan dari bahan alam tambang sumber Nitrat dan Potassium di Chilie. Mengandung Nitrogen dalam bentuk Nitrat dan Kalium yang mudah larut.', 'f882daef-f6b6-43a9-862c-b2ae64ab04f8.jpg', 2000, 'Karung', '63000.00', 5, '2024-08-04 14:09:18'),
(6, 4, 'Zinc sulphate heptahydrate 50kg', 'Aplikasi utama dari zinc sulphate yaitu sebagai koagulan dalam produksi rayon. Zinc Sulphate digunakan untuk produksi pakan ternak, pupuk, dan pertanian. Seperti senyawa zinc lainnya, dapat digunakan untuk mengontrol pertumbuhan lumut di atap. Senyawa ini juga digunakan seperti dalam elektrolit untuk penyepuhan seng, sebagai mordan dalam zat warna, sebagai pengawet untuk kulit, untuk proses produksi kawat dan bahan kulit dan dalam kedokteran sebagai astringent dan obat muntah.', 'untitled-1.png', 50000, 'Karung', '350000.00', 2, '2024-08-04 14:18:53'),
(7, 4, 'Zinc Sulphate SA 25Kg', 'Zinc sulfate adalah bahan zinc kering yang digunakan paling sering. Bahan ini merupakan senyawa non-organik yg mudah terlarut air dan  efektif dalam bentuk butiran / granular. Zinc sulfate ini sering diaplikasikan ke tanah yang rendah kandungan Zinc nya untuk memenuhi kebutuhan akan unsur mikro zinc.', 'Screenshot 2024-08-04 212126.png', 25000, 'Karung', '273000.00', 15, '2024-08-04 14:24:03'),
(8, 4, 'Caustic Soda 25Kg', 'Caustic soda adalah senyawa kimia yang sangat korosif, atau yang juga dikenal sebagai sodium hydroxide (NaOH), adalah senyawa kimia yang sangat korosif dan beralkali. Berbentuk padat putih yang sangat mudah larut dalam air, caustic soda digunakan dalam berbagai aplikasi industri dan komersial', 'Screenshot 2024-08-04 212148.png', 25000, 'Karung', '132000.00', 12, '2024-08-04 14:26:29'),
(9, 1, 'PN 13-0-45/KNO3 Prill 2Kg', 'KNO3 PN Prill putih kemasan Pabrik 2 KG\r\nKeunggulan pupuk PN Prill (KNO3 Putih) :\r\n* Nitrogen dalam bentuk Nitrat, sehingga cepterserap tanaman.\r\n* tidak mengandung Chlor (Cl), sehingga tidak meracuni tanaman yang sensitive Chlore\r\n* mengandung unsur Kalium yang tinggi, sehingga mampu mencegah kerontokan bunga & buah', 'd9544ec6-1d19-4e2c-9644-55edf156b419.jpg', 2000, 'Karung', '48600.00', 6, '2024-08-04 14:28:28'),
(10, 4, 'ZK (POTASSIUM SULFATE) 50Kg', 'ZK ( Potassium Sulfat ) adalah pupuk makro dengan kandungan Kalium (Potassium) tinggi dan mengandung hara makro sekunder Sulfur yang dibutuhkan oleh tanaman terutama dalam pembentukan umbi dan buah. Tidak mengandung unsur Chlor, sangat cocok untuk tanaman yang sensitif terhadap Chlor.', 'd04926d9-6fa7-4d4c-b41c-0abf10160f1e.png', 50000, 'Karung', '950000.00', 2, '2024-08-04 14:30:08'),
(11, 5, 'TOP- SAT 240 SL 1 LT', 'TOP-SAT 240 SL adalah herbisida sistemik purna tumbuh, berbentuk larutan dalam air berwarna kuning, untuk mengendalikan gulma umum pada pertanaman kelapa sawit (TBM), karet (TBM) dan kopi (TBM)', '74_TOP-SAT.jpg', 1000, 'Botol', '58000.00', 6, '2024-08-20 23:20:51'),
(12, 5, 'RAMOXONE 278 SL 1 LT', 'RAMOXONE 278 SL adalah Herbisida kontak pra tumbuh dan purna tumbuh berbentuk larutan berwarna hijau tua, untuk mengendalikan gulma berdaun lebar dan berdaun sempit di pertanaman karet (TBM) dan kelapa sawit (TBM).', '76_Ramoxone.jpg', 1000, 'Botol', '56000.00', 2, '2024-08-20 23:23:51'),
(13, 5, 'MAR - XONE 300 SL 1 LT', 'MARXONE 300 SL adalah Herbisida kontak purna tumbuh berbentuk larutan berwarna hijau tua untuk mengendalikan gulma pada tanaman jagung, karet (TBM), dan kelapa sawit (TBM).', '76_Ramoxone (1).jpg', 1000, 'Botol', '53000.00', 9, '2024-08-20 23:26:03'),
(14, 6, 'SA15 Sprayer', 'Alat semprot premium kualitas import dilengkapi Control Valve.\r\nSPESIFIKASI\r\n– Tangki polypropylene murni tahan terhadap sinar UV isis 15 ltr\r\n– Tutup tangki semprot lebar berdiameter 6″ untuk memudahkan pengisian\r\n– Pompa piston tekanan tinggi (sd 5 bar)\r\n– Kran Semprot otomatis', 'SA15-scaled.jpg', 3500, 'Pcs', '512000.00', 4, '2024-08-20 23:28:42'),
(15, 6, 'RB 15 Sprayer', 'SPECIFICATION:\r\nVirgin, impact resistant polypropylene tank (UV stabilized)\r\n6″ diameter sprayer cap for easy filling\r\nHigh pressure piston pump (5 bar)\r\nAutomatic trigger valve\r\nTrigger filter (100 mesh)', 'RB15-SA15.jpg', 3500, 'Pcs', '511000.00', 3, '2024-08-20 23:30:31'),
(16, 6, 'CIFARELLI MI200 / MI200PG', 'Hand-held Mist Sprayer\r\nLiguid tank capacity: : 17 L/27 L - PG\r\nFuel tank capacity: 2.3 L\r\nMaximum Vertical range : 16 meters\r\nMaximum Horizontal range : 18 meter\r\nWeight : 12.2 kg\r\npackaging with pipes: Carton box 78 x 46 x 38cm', 'atomizer-c.jpg', 12500, 'Pcs', '1300000.00', 3, '2024-08-20 23:35:35'),
(17, 6, 'CIFARELLI V1200 - Portable Loose Fruit Collector', 'V1200 adalah ruang hampa untuk mengumpulkan chestnut,\r\nhazelnut, kenari, almond, dan biji pohon ek dengan cepat dan\r\nefektif. mesin ini memisahkan produk dari daun atau kotoran\r\nlain yang tersedot yang dikeluarkan melalui pintu keluar\r\nudara.', 'v1200eridotta.png', 16500, 'Pcs', '3900000.00', 3, '2024-08-20 23:37:53');
