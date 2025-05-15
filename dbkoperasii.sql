-- Drop tables if they already exist (optional, for clean setup)
DROP TABLE IF EXISTS pembayaran;
DROP TABLE IF EXISTS detail_pesanan;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS produk;
DROP TABLE IF EXISTS jenis_produk;
DROP TABLE IF EXISTS anggota;
DROP TABLE IF EXISTS kartu_diskon;
DROP TABLE IF EXISTS pegawai;

-- Table: pegawai
CREATE TABLE pegawai (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nip VARCHAR(10) UNIQUE,
    nama VARCHAR(45),
    jenis_kelamin CHAR(1),
    jabatan VARCHAR(45)
);

-- Table: kartu_diskon
CREATE TABLE kartu_diskon (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(45),
    deskripsi TEXT,
    persen_diskon INT
);

-- Table: anggota
CREATE TABLE anggota (
    id INT PRIMARY KEY AUTO_INCREMENT,
    status_aktif BOOLEAN,
    pegawai_id INT,
    kartu_diskon_id INT,
    FOREIGN KEY (pegawai_id) REFERENCES pegawai(id),
    FOREIGN KEY (kartu_diskon_id) REFERENCES kartu_diskon(id)
);

-- Table: jenis_produk
CREATE TABLE jenis_produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(45),
    deskripsi TEXT
);

-- Table: produk
CREATE TABLE produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(45) UNIQUE,
    nama VARCHAR(45),
    deskripsi TEXT,
    harga DOUBLE,
    stok INT,
    jenis_produk_id INT,
    FOREIGN KEY (jenis_produk_id) REFERENCES jenis_produk(id)
);

-- Table: pesanan
CREATE TABLE pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tanggal DATE,
    diskon INT,
    status_bayar BOOLEAN,
    anggota_id INT,
    FOREIGN KEY (anggota_id) REFERENCES anggota(id)
);

-- Table: detail_pesanan
CREATE TABLE detail_pesanan (
    pesanan_id INT,
    produk_id INT,
    jumlah INT,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id),
    FOREIGN KEY (produk_id) REFERENCES produk(id)
);

-- Table: pembayaran
CREATE TABLE pembayaran (
    id INT PRIMARY KEY AUTO_INCREMENT,
    jumlah_bayar DOUBLE,
    tanggal DATE,
    pesanan_id INT,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id)
);
