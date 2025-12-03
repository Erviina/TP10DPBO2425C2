<?php
// Mengimpor file model Event yang berisi akses database untuk tabel events
require_once __DIR__ . '/../models/Event.php';

class EventViewModel {

    // Menyimpan instance model Event
    private $model;

    // Menyimpan seluruh data event untuk ditampilkan di view (event_list.php)
    public $events = [];

    //Konstruktor
     
    public function __construct($db) {
        // Membuat objek model Event menggunakan koneksi database
        $this->model = new Event($db);

        // Mengambil semua data event dari tabel events
        // lalu disimpan dalam variabel $events yang bisa diakses view
        $this->events = $this->model->getAll();
    }

    /**
     * Meng-handle request dari form (POST)
     * serta request delete melalui URL (GET)
     */
    public function handleRequest() {

        // Mengecek apakah permintaan dari form menggunakan POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Kondisi untuk menambah data event
            if (isset($_POST['create_event'])) {
                // Memanggil fungsi create() pada model Event untuk menyimpan data baru
                $this->model->create(
                    $_POST['name'],
                    $_POST['date'],
                    $_POST['location']
                );

                // Redirect ke halaman events agar tidak submit ulang
                header('Location: index.php?page=events');
                exit;
            }

            // Kondisi untuk mengupdate data event yang sudah ada
            if (isset($_POST['update_event'])) {
                // Memanggil fungsi update() berdasarkan ID event
                $this->model->update(
                    $_POST['id'],
                    $_POST['name'],
                    $_POST['date'],
                    $_POST['location']
                );

                // Redirect kembali ke halaman events
                header('Location: index.php?page=events');
                exit;
            }
        }

        // Mengecek jika ada parameter GET untuk menghapus event
        if (isset($_GET['delete_event'])) {

            // Menghapus data dari tabel events berdasarkan ID
            $this->model->delete($_GET['delete_event']);

            // Redirect setelah proses delete selesai
            header('Location: index.php?page=events');
            exit;
        }
    }

    /**
     * Fungsi untuk mendapatkan satu data event berdasarkan ID
     * digunakan ketika form edit event dibuka
     */
    public function getEvent($id) {
        return $this->model->getById($id);
    }
}
