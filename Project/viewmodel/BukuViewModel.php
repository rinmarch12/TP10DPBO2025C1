<?php
require_once 'model/Buku.php';
require_once 'model/Kategori.php';
require_once 'model/Penerbit.php';

class BukuViewModel {
    private $buku;
    private $kategori;
    private $penerbit;

    public function __construct() {
        $this->buku = new Buku();
        $this->kategori = new Kategori();
        $this->penerbit = new Penerbit();
    }

    public function getBukuList() {
        return $this->buku->getAll();
    }

    public function getBukuById($id) {
        return $this->buku->getById($id);
    }

    public function getKategoriList() {
        return $this->kategori->getAll();
    }

    public function getPenerbitList() {
        return $this->penerbit->getAll();
    }

    public function addBuku($judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit) {
        return $this->buku->create($judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit);
    }

    public function updateBuku($id, $judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit) {
        return $this->buku->update($id, $judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit);
    }

    public function deleteBuku($id) {
        return $this->buku->delete($id);
    }
}
?>