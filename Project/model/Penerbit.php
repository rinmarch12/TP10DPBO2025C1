<?php
require_once 'config/Database.php';

class Penerbit {
    private $conn;
    private $table = 'penerbit';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nama_penerbit";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_penerbit, $alamat) {
        $query = "INSERT INTO " . $this->table . " (nama_penerbit, alamat) VALUES (:nama_penerbit, :alamat)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_penerbit', $nama_penerbit);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function update($id, $nama_penerbit, $alamat) {
        $query = "UPDATE " . $this->table . " SET nama_penerbit = :nama_penerbit, alamat = :alamat WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_penerbit', $nama_penerbit);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        // Cek apakah penerbit masih digunakan di tabel buku
        $checkQuery = "SELECT COUNT(*) as count FROM buku WHERE penerbit_id = :id";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result['count'] > 0) {
            return false; // Tidak bisa dihapus karena masih digunakan
        }
        
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>