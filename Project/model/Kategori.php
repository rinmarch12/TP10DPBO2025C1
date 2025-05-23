<?php
require_once 'config/Database.php';

class Kategori {
    private $conn;
    private $table = 'kategori';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nama_kategori";
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

    public function create($nama_kategori) {
        $query = "INSERT INTO " . $this->table . " (nama_kategori) VALUES (:nama_kategori)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_kategori', $nama_kategori);
        return $stmt->execute();
    }

    public function update($id, $nama_kategori) {
        $query = "UPDATE " . $this->table . " SET nama_kategori = :nama_kategori WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_kategori', $nama_kategori);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        // Cek apakah kategori masih digunakan di tabel buku
        $checkQuery = "SELECT COUNT(*) as count FROM buku WHERE kategori_id = :id";
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