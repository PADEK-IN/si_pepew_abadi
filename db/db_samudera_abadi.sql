CREATE DATABASE db_laundry;

USE db_laundry;

-- Tabel users
CREATE TABLE users (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('admin', 'pelanggan') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel admin
CREATE TABLE admin (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(5) NOT NULL,
    nama VARCHAR(30) NOT NULL,
    jenis_kelamin ENUM('laki-laki', 'perempuan') NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL,
    foto VARCHAR(50),
    isValid BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- Tabel pelanggan
CREATE TABLE pelanggan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(5) NOT NULL,
    nama VARCHAR(30) NOT NULL,
    jenis_kelamin ENUM('laki-laki', 'perempuan') NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    kota VARCHAR(10) NOT NULL,
    kode_pos VARCHAR(5) NOT NULL,
    pekerjaan VARCHAR(20) NOT NULL,
    perusahaan VARCHAR(25),
    npwp VARCHAR(16),
    no_telp VARCHAR(15) NOT NULL,
    foto VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- Tabel kategori
CREATE TABLE kategori (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(15) NOT NULL
);

-- Tabel produk
CREATE TABLE produk (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT(5) NOT NULL,
    nama VARCHAR(30) NOT NULL,
    deskripsi VARCHAR(70),
    gambar VARCHAR(50),
    berat INT(11) NOT NULL,
    satuan VARCHAR(10) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id)
);

-- Tabel pesanan
CREATE TABLE pesanan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_admin INT(5) NOT NULL,
    id_pelanggan INT(5) NOT NULL,
    metode_kirim ENUM('diantar', 'dijemput') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES admin(id),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id),
);

-- Tabel order_items
CREATE TABLE pesanan_items (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    id_produk INT(5) NOT NULL,
    jumlah INT(7) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_produk) REFERENCES produk(id)
);

-- Tabel tagihan
CREATE TABLE tagihan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    metode_bayar ENUM('cod', 'transfer', 'tempo 3 hari', 'tempo 7 hari', 'tempo 30 hari') NOT NULL,
    diskon DECIMAL(10,2) DEFAULT 0,
    ppn DECIMAL(10,2) DEFAULT 0,
    pph DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(20,2) NOT NULL,
    jumlah_bayar VARCHAR(30) NOT NULL,
    bukti_bayar VARCHAR(50),
    status ENUM('lunas', 'tertunda', 'batal') DEFAULT 'tertunda',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);

-- Tabel pengiriman
CREATE TABLE pengiriman (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    tanggal DATE NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    bukti VARCHAR(50),
    status ENUM('terkirim', 'diperjalanan', 'diproses') DEFAULT 'diproses',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);
