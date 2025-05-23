<?php
require_once 'config/Database.php';

class Buku {
    private $conn;
    private $table = 'buku';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT b.*, k.nama_kategori, p.nama_penerbit 
                 FROM " . $this->table . " b 
                 JOIN kategori k ON b.kategori_id = k.id 
                 JOIN penerbit p ON b.penerbit_id = p.id 
                 ORDER BY b.judul";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT b.*, k.nama_kategori, p.nama_penerbit 
                 FROM " . $this->table . " b 
                 JOIN kategori k ON b.kategori_id = k.id 
                 JOIN penerbit p ON b.penerbit_id = p.id 
                 WHERE b.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit) {
        $query = "INSERT INTO " . $this->table . " (judul, pengarang, harga, stok, kategori_id, penerbit_id, tahun_terbit) 
                 VALUES (:judul, :pengarang, :harga, :stok, :kategori_id, :penerbit_id, :tahun_terbit)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':pengarang', $pengarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':kategori_id', $kategori_id);
        $stmt->bindParam(':penerbit_id', $penerbit_id);
        $stmt->bindParam(':tahun_terbit', $tahun_terbit);
        return $stmt->execute();
    }

    public function update($id, $judul, $pengarang, $harga, $stok, $kategori_id, $penerbit_id, $tahun_terbit) {
        $query = "UPDATE " . $this->table . " SET judul = :judul, pengarang = :pengarang, harga = :harga, 
                 stok = :stok, kategori_id = :kategori_id, penerbit_id = :penerbit_id, tahun_terbit = :tahun_terbit 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':pengarang', $pengarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':kategori_id', $kategori_id);
        $stmt->bindParam(':penerbit_id', $penerbit_id);
        $stmt->bindParam(':tahun_terbit', $tahun_terbit);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>