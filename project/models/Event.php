<?php

// Model Event
// Berfungsi untuk mengelola data dari tabel `events` di database.

class Event {

    // Properti untuk menyimpan koneksi database (PDO)
    private $db;

    //Konstruktor
    public function __construct($conn) {
        $this->db = $conn;
    }

    //Mengambil semua data event
    //Data diurutkan berdasarkan tanggal terbaru (DESC)
     
    public function getAll() {
        // Query langsung karena tidak ada nilai dari input user
        $stmt = $this->db->query("SELECT * FROM events ORDER BY date DESC");

        // Mengembalikan hasil dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Mengambil satu data event berdasarkan id
     
    public function getById($id) {
        // Menyiapkan query SELECT dengan tanda "?"
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = ?");

        // Eksekusi query dengan parameter id
        $stmt->execute([$id]);

        // Ambil satu baris hasil query
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Menambahkan event baru
    
    public function create($name, $date, $location) {
        // Query INSERT menggunakan prepared statement
        $stmt = $this->db->prepare(
            "INSERT INTO events (name, date, location) 
             VALUES (?, ?, ?)"
        );

        // Eksekusi dengan data dari parameter
        return $stmt->execute([$name, $date, $location]);
    }

    //Mengupdate data event berdasarkan id
     
    public function update($id, $name, $date, $location) {
        $stmt = $this->db->prepare(
            "UPDATE events 
             SET name = ?, 
                 date = ?, 
                 location = ? 
             WHERE id = ?"
        );

        return $stmt->execute([$name, $date, $location, $id]);
    }

    //Menghapus event berdasarkan id
     
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM events WHERE id = ?");
        
        return $stmt->execute([$id]);
    }
}
