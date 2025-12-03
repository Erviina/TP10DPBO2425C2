<?php
// Memanggil file model yang diperlukan
require_once __DIR__ . '/../models/Booking.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Client.php';

class BookingViewModel {
    // Properti untuk menyimpan instance model dan data
    private $model;
    private $eventModel;
    private $clientModel;
    public $bookings = [];
    public $events = [];
    public $clients = [];

    // Konstruktor menerima koneksi database
    public function __construct($db) {
        // Membuat instance model Booking
        $this->model = new Booking($db);
        // Membuat instance model Event
        $this->eventModel = new Event($db);
        // Membuat instance model Client
        $this->clientModel = new Client($db);
        
        // Mengambil semua data bookings dari database
        $this->bookings = $this->model->getAll();
        // Mengambil semua data events untuk ditampilkan di pilihan input
        $this->events = $this->eventModel->getAll();
        // Mengambil semua data clients untuk relasi booking
        $this->clients = $this->clientModel->getAll();
    }

    // Method untuk menangani request dari form (Create, Update, Delete)
    public function handleRequest() {
        // Mengecek apakah form dikirim menggunakan POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Jika ada form create booking dikirim
            if (isset($_POST['create_booking'])) {
                // Menambahkan data booking baru
                $this->model->create($_POST['event_id'], $_POST['client_id'], $_POST['booked_at']);
                // Redirect kembali ke halaman bookings
                header('Location: index.php?page=bookings');
                exit;
            }

            // Jika ada form update booking dikirim
            if (isset($_POST['update_booking'])) {
                // Memperbarui data booking berdasarkan id
                $this->model->update($_POST['id'], $_POST['event_id'], $_POST['client_id'], $_POST['booked_at']);
                // Redirect setelah update
                header('Location: index.php?page=bookings');
                exit;
            }
        }

        // Mengecek parameter GET untuk menghapus data booking
        if (isset($_GET['delete_booking'])) {
            // Menghapus data booking berdasarkan id
            $this->model->delete($_GET['delete_booking']);
            // Redirect setelah delete
            header('Location: index.php?page=bookings');
            exit;
        }
    }

    // Method untuk mendapatkan data booking berdasarkan ID
    public function getBooking($id) {
        return $this->model->getById($id);
    }
}
