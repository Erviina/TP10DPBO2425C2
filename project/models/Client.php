<?php

// Model Client
// Bertanggung jawab mengelola data tabel `clients` di database.

class Client {

    // Properti untuk menyimpan koneksi database (PDO)
    private $db;

    //Konstruktor

    public function __construct($conn) {
        $this->db = $conn;
    }

    /**
     * Mengambil semua data clients
     * Data diurutkan berdasarkan id terbaru (DESC)
     */
    public function getAll() {
        // Query langsung karena tidak ada input user
        $stmt = $this->db->query("SELECT * FROM clients ORDER BY id DESC");

        // Mengembalikan array asosiatif berisi semua baris dari tabel clients
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Mengambil satu data client berdasarkan id
     
    public function getById($id) {
        // Siapkan query dengan tanda "?"
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE id = ?");

        // Eksekusi query dengan parameter id
        $stmt->execute([$id]);

        // Ambil satu baris hasil query
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Menambahkan data client baru
     
    public function create($name, $phone) {
        // Query dengan prepared statement (lebih aman)
        $stmt = $this->db->prepare(
            "INSERT INTO clients (name, phone) 
             VALUES (?, ?)"
        );

        // Eksekusi dengan data dari parameter
        return $stmt->execute([$name, $phone]);
    }

    //Melakukan pembaruan (edit) data client berdasarkan id
     
    public function update($id, $name, $phone) {
        $stmt = $this->db->prepare(
            "UPDATE clients 
             SET name = ?, 
                 phone = ? 
             WHERE id = ?"
        );

        return $stmt->execute([$name, $phone, $id]);
    }

    // Menghapus data client berdasarkan id

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM clients WHERE id = ?");
        
        return $stmt->execute([$id]);
    }
}
