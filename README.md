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
- Styling konsisten menggunakan Bootstrap/CSS framework

**Template System:**
- Template berbeda untuk setiap jenis tampilan:
  - Tabel untuk daftar buku
  - Card layout untuk kategori dan penerbit
  - Form modal/halaman terpisah untuk input data

### 7. Fitur Tambahan
**Success Messages:**
- Parameter URL `?success=add` menampilkan notifikasi berhasil menambah data
- Feedback visual untuk operasi yang berhasil

**Responsive Design:**
- Interface responsif untuk berbagai ukuran layar
- Penggunaan Bootstrap untuk konsistensi tampilan

**Data Validation:**
- Validasi client-side dan server-side
- Handling error untuk input yang tidak valid

## Dokumentasi Visual

### 1. Form Tambah Buku
![Form Tambah Buku - Menampilkan form dengan semua field yang diperlukan untuk menambah data buku baru termasuk dropdown untuk kategori dan penerbit]

### 2. Form Tambah Kategori  
![Form Tambah Kategori - Form sederhana untuk menambah kategori buku baru]

### 3. Form Tambah Penerbit
![Form Tambah Penerbit - Form untuk menambah data penerbit dengan field nama dan alamat]

### 4. Form Edit Buku
![Form Edit Buku - Form edit yang sudah terisi dengan data existing dari buku "Negeri 5 Menara"]

### 5. Form Edit Kategori
![Form Edit Kategori - Form edit untuk mengubah nama kategori yang sudah ada]

### 6. Form Edit Penerbit  
![Form Edit Penerbit - Form edit untuk mengubah data penerbit yang sudah ada]

### 7. Daftar Buku (Halaman Utama)
![Daftar Buku - Tabel berisi daftar semua buku dengan informasi lengkap dan tombol aksi]

### 8. Daftar Kategori
![Daftar Kategori - Layout card menampilkan semua kategori buku yang tersedia]

### 9. Daftar Penerbit
![Daftar Penerbit - Layout card menampilkan informasi penerbit dengan nama dan alamat]

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

## Teknologi yang Digunakan
- **Backend:** PHP dengan paradigma OOP
- **Database:** MySQL 
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Server:** Apache (localhost/XAMPP)
- **Design Pattern:** MVC (Model-View-Controller)
