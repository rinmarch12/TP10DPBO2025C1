CREATE DATABASE toko_buku;
USE toko_buku;

-- Tabel Kategori Buku
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL
);

-- Tabel Penerbit
CREATE TABLE penerbit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_penerbit VARCHAR(100) NOT NULL,
    alamat TEXT
);

-- Tabel Buku (dengan foreign key ke kategori dan penerbit)
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    pengarang VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    kategori_id INT NOT NULL,
    penerbit_id INT NOT NULL,
    tahun_terbit YEAR,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id),
    FOREIGN KEY (penerbit_id) REFERENCES penerbit(id)
);

-- Data awal untuk kategori
INSERT INTO kategori (nama_kategori) VALUES 
('Fiksi'), 
('Non-Fiksi'), 
('Pendidikan'),
('Teknologi'),
('Sejarah');

-- Data awal untuk penerbit
INSERT INTO penerbit (nama_penerbit, alamat) VALUES 
('Gramedia Pustaka Utama', 'Jakarta'),
('Erlangga', 'Jakarta'),
('Mizan', 'Bandung'),
('Bentang Pustaka', 'Yogyakarta');

-- Data awal untuk buku
INSERT INTO buku (judul, pengarang, harga, stok, kategori_id, penerbit_id, tahun_terbit) VALUES
('Laskar Pelangi', 'Andrea Hirata', 75000, 25, 1, 1, 2005),
('Belajar PHP', 'Budi Raharjo', 120000, 15, 4, 2, 2023),
('Sejarah Indonesia', 'Ricklefs', 95000, 10, 5, 3, 2020);