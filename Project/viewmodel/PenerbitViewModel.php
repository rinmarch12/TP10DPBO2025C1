<?php
require_once 'model/Penerbit.php';

class PenerbitViewModel {
    private $penerbit;

    public function __construct() {
        $this->penerbit = new Penerbit();
    }

    public function getPenerbitList() {
        return $this->penerbit->getAll();
    }

    public function getPenerbitById($id) {
        return $this->penerbit->getById($id);
    }

    public function addPenerbit($nama_penerbit, $alamat) {
        return $this->penerbit->create($nama_penerbit, $alamat);
    }

    public function updatePenerbit($id, $nama_penerbit, $alamat) {
        return $this->penerbit->update($id, $nama_penerbit, $alamat);
    }

    public function deletePenerbit($id) {
        return $this->penerbit->delete($id);
    }
}
?>