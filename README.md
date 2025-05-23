# Dokumentasi Sistem Manajemen Toko Buku Digital

## Janji
Saya Ririn Marchelina dengan NIM 2303662 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Alur Program

### 1. Inisialisasi Sistem
- Program dimulai dari file utama (index.php) yang memanggil kelas tampilan untuk mengatur alur program
- Sistem memiliki tiga entitas utama: **Buku**, **Kategori**, dan **Penerbit**
- Kelas tampilan memeriksa parameter URL untuk menentukan entitas dan aksi:
  - `?entity=buku` → mengelola data buku
  - `?entity=kategori` → mengelola data kategori
  - `?entity=penerbit` → mengelola data penerbit
- Tanpa parameter → tampilkan daftar buku sebagai halaman utama

### 2. Manajemen Data Buku
**Menampilkan Daftar Buku:**
- Sistem mengambil seluruh data buku beserta informasi kategori dan penerbit dari database
- Data ditampilkan dalam format tabel dengan kolom: No, Judul, Pengarang, Kategori, Penerbit, Harga, Stok, Tahun, Aksi
- Setiap baris dilengkapi tombol edit (ikon pensil) dan hapus (ikon tempat sampah)
- Tombol "Tambah Buku" tersedia di pojok kanan atas

**Form Tambah/Edit Buku:**
- Form berisi field: Judul Buku, Pengarang, Kategori (dropdown), Penerbit (dropdown), Harga, Stok, Tahun Terbit
- Dropdown kategori dan penerbit diisi otomatis dari data master
- Validasi input dilakukan sebelum penyimpanan

### 3. Manajemen Data Kategori
**Menampilkan Daftar Kategori:**
- Data kategori ditampilkan dalam format card/kotak dengan nama kategori dan ID
- Setiap kategori memiliki tombol edit dan hapus
- Tombol "Tambah Kategori" tersedia untuk menambah kategori baru

**Form Tambah/Edit Kategori:**
- Form sederhana hanya berisi field "Nama Kategori"
- Validasi memastikan nama kategori tidak kosong dan unik

### 4. Manajemen Data Penerbit
**Menampilkan Daftar Penerbit:**
- Data penerbit ditampilkan dalam format card dengan informasi nama dan alamat
- Setiap penerbit menampilkan nama, alamat, dan ID
- Dilengkapi tombol edit dan hapus untuk setiap penerbit

**Form Tambah/Edit Penerbit:**
- Form berisi field: Nama Penerbit dan Alamat (textarea)
- Alamat menggunakan textarea untuk menampung alamat yang lebih panjang

### 5. Proses CRUD (Create, Read, Update, Delete)
**Create (Tambah Data):**
- User mengklik tombol tambah pada entitas yang diinginkan
- Sistem menampilkan form kosong untuk input data baru
- Data dikirim melalui POST ke modul proses
- Setelah berhasil, redirect ke halaman daftar dengan parameter `?success=add`

**Read (Baca Data):**
- Data diambil dari database menggunakan query SELECT
- Untuk buku: JOIN dengan tabel kategori dan penerbit untuk mendapatkan nama lengkap
- Data ditampilkan sesuai template masing-masing entitas

**Update (Edit Data):**
- User mengklik tombol edit dengan parameter ID
- Form diisi otomatis dengan data existing
- Setelah submit, data diupdate berdasarkan ID
- Redirect ke halaman daftar setelah berhasil

**Delete (Hapus Data):**
- User mengklik tombol hapus
- Sistem menampilkan konfirmasi JavaScript "Apakah Anda yakin ingin menghapus data ini?"
- Jika konfirmasi OK, data dihapus dari database berdasarkan ID
- Redirect ke halaman daftar setelah berhasil

### 6. Navigasi dan Template System
**Navigasi Header:**
- Header biru dengan judul "Toko Buku Digital"
- Menu navigasi: Buku, Kategori, Penerbit
- Styling konsisten menggunakan Bootstrap/CSS frameworkZsZ

## Dokumentasi Visual

### 1. Form Tambah Buku
![Add Buku](https://github.com/user-attachments/assets/1580964b-ed41-4f09-bc13-0dd2ffb3cc97)

### 2. Form Tambah Kategori  
![Add Kategori](https://github.com/user-attachments/assets/f2db5d34-4ddf-41a8-bf11-e93fd755b1f7)

### 3. Form Tambah Penerbit
![Add Penerbit](https://github.com/user-attachments/assets/8973ab5a-5edd-439a-8bb7-edf7fa2f3fc4)

### 4. Form Edit Buku
![Edit Buku](https://github.com/user-attachments/assets/1e7a022e-80b8-489d-8968-f3b5c3be9b09)

### 5. Form Edit Kategori
![Edit Kategori](https://github.com/user-attachments/assets/af5d168e-1593-4d3a-84e3-66f3c9d21af7)

### 6. Form Edit Penerbit  
![Edit Penerbit](https://github.com/user-attachments/assets/7d1c02fd-7b0c-40d6-ae85-e597b73792d7)

### 7. Daftar Buku (Halaman Utama)
![Tabel Buku](https://github.com/user-attachments/assets/35d3ee63-c6e6-4e56-9078-55361d6d3138)

### 8. Daftar Kategori
![Tabel Kategori](https://github.com/user-attachments/assets/f9570dc8-bc80-4e83-ae55-2ca3b0a8f47f)

### 9. Daftar Penerbit
![Tabel Penerbit](https://github.com/user-attachments/assets/4c0ee3ff-bfce-4890-a6a3-76a404bd6a80)

## Struktur Database
**Tabel Buku:**
- id_buku (Primary Key)
- judul_buku
- pengarang  
- id_kategori (Foreign Key)
- id_penerbit (Foreign Key)
- harga
- stok
- tahun_terbit

**Tabel Kategori:**
- id_kategori (Primary Key)
- nama_kategori

**Tabel Penerbit:**
- id_penerbit (Primary Key)
- nama_penerbit
- alamat
