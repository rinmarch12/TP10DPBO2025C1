<?php
require_once 'model/Kategori.php';

class KategoriViewModel {
    private $kategori;

    public function __construct() {
        $this->kategori = new Kategori();
    }

    public function getKategoriList() {
        return $this->kategori->getAll();
    }

    public function getKategoriById($id) {
        return $this->kategori->getById($id);
    }

    public function addKategori($nama_kategori) {
        return $this->kategori->create($nama_kategori);
    }

    public function updateKategori($id, $nama_kategori) {
        return $this->kategori->update($id, $nama_kategori);
    }

    public function deleteKategori($id) {
        return $this->kategori->delete($id);
    }
}
?>