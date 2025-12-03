<?php
class Staff {
    // Property untuk menyimpan koneksi database
    private $db;

    // Constructor untuk menginisialisasi koneksi database saat objek dibuat
    public function __construct($conn) {
        $this->db = $conn;
    }

    // Mengambil seluruh data staff dengan join ke tabel events untuk menampilkan nama event
    public function getAll() {
        // Query mengambil semua data staff dan nama event terkait
        $sql = "SELECT s.*, e.name as event_name
                FROM staff s
                LEFT JOIN events e ON s.event_id = e.id
                ORDER BY s.id DESC";

        // Menjalankan query langsung karena tanpa parameter
        $stmt = $this->db->query($sql);

        // Mengembalikan semua hasil dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil data staff berdasarkan id (satu data saja)
    public function getById($id) {
        // Query dengan prepared statement untuk keamanan
        $stmt = $this->db->prepare("SELECT * FROM staff WHERE id = ?");

        // Menjalankan query dengan parameter id
        $stmt->execute([$id]);

        // Mengembalikan satu baris data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan data staff baru ke database
    public function create($name, $role, $event_id) {
        // Query insert untuk menambah record baru
        $stmt = $this->db->prepare("INSERT INTO staff (name, role, event_id) VALUES (?, ?, ?)");

        // Menjalankan query dengan parameter
        return $stmt->execute([$name, $role, $event_id]);
    }

    // Mengupdate data staff berdasarkan id
    public function update($id, $name, $role, $event_id) {
        // Query update untuk mengubah data staff
        $stmt = $this->db->prepare("UPDATE staff SET name=?, role=?, event_id=? WHERE id=?");

        // Eksekusi dengan parameter sesuai urutan
        return $stmt->execute([$name, $role, $event_id, $id]);
    }

    // Menghapus data staff berdasarkan id
    public function delete($id) {
        // Query delete
        $stmt = $this->db->prepare("DELETE FROM staff WHERE id=?");

        // Eksekusi dengan parameter id
        return $stmt->execute([$id]);
    }
}
