<?php
// Model ini berisi fungsi-fungsi untuk mengakses dan mengolah data tabel bookings di database

class Booking {

    // Properti untuk menyimpan koneksi database
    private $db;

    // Konstruktor menerima objek koneksi  dari luar
    public function __construct($conn) {
        $this->db = $conn;
    }

    //Ambil semua data booking
    public function getAll() {
        $sql = "SELECT b.*, 
                       e.name AS event_name,      -- nama event dari tabel events
                       c.name AS client_name      -- nama client dari tabel clients
                FROM bookings b
                LEFT JOIN events e ON b.event_id = e.id     -- relasi dengan events
                LEFT JOIN clients c ON b.client_id = c.id   -- relasi dengan clients
                ORDER BY b.booked_at DESC";                 //urutkan dari booking terbaru

        // Eksekusi query langsung (tanpa parameter)
        $stmt = $this->db->query($sql);

        // Ambil semua baris hasil query dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Ambil satu data booking berdasarkan ID
     
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM bookings WHERE id = ?");
        
        // Eksekusi dengan parameter array (menghindari SQL injection)
        $stmt->execute([$id]);
        
        // Ambil satu baris data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Tambah data booking baru
    
    public function create($event_id, $client_id, $booked_at) {
        $stmt = $this->db->prepare(
            "INSERT INTO bookings (event_id, client_id, booked_at) 
             VALUES (?, ?, ?)"
        );

        // mengeksekusi dengan nilai yang diberikan user
        return $stmt->execute([$event_id, $client_id, $booked_at]);
    }

    //Update data booking berdasarkan ID
     
    public function update($id, $event_id, $client_id, $booked_at) {
        $stmt = $this->db->prepare(
            "UPDATE bookings 
             SET event_id = ?, 
                 client_id = ?, 
                 booked_at = ? 
             WHERE id = ?"
        );

        // Eksekusi update
        return $stmt->execute([$event_id, $client_id, $booked_at, $id]);
    }

    //Hapus data booking berdasarkan ID

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM bookings WHERE id = ?");
        
        // Eksekusi delete
        return $stmt->execute([$id]);
    }
}
