CREATE DATABASE db_samudera_abadi;

USE db_samudera_abadi;

-- Tabel users
CREATE TABLE users (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'pelanggan') NOT NULL DEFAULT 'pelanggan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
);

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
);

-- Tabel kategori
CREATE TABLE kategori (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(15) NOT NULL
);

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
);

-- Tabel keranjang
CREATE TABLE keranjang (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(5) NOT NULL,
    id_barang INT(5) NOT NULL,
    jumlah INT(5) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_barang) REFERENCES barang(id)
);

-- Tabel pesanan
CREATE TABLE pesanan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT(5) NOT NULL,
    metode_kirim ENUM('diantar', 'dijemput') NOT NULL,
    ppn DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(20,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id)
);

-- Tabel order_items
CREATE TABLE pesanan_items (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    id_barang INT(5) NOT NULL,
    jumlah INT(7) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_barang) REFERENCES barang(id)
);

-- Tabel tagihan
CREATE TABLE tagihan (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT(5) NOT NULL,
    metode_bayar ENUM('cod', 'transfer') NOT NULL,
    jumlah_bayar VARCHAR(30) NOT NULL,
    bukti_bayar VARCHAR(255),
    status ENUM('lunas', 'tertunda', 'batal') DEFAULT 'tertunda',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);
