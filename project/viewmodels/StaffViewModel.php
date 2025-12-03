<?php
// Mengimpor model Staff yang berisi fungsi CRUD untuk tabel staff
require_once __DIR__ . '/../models/Staff.php';

// Mengimpor model Event untuk mengambil data event saat assign staff
require_once __DIR__ . '/../models/Event.php';

class StaffViewModel {

    // Menyimpan instance model Staff
    private $model;

    // Menyimpan instance model Event (agar data event bisa ditampilkan pada form staff)
    private $eventModel;

    // Variabel publik untuk menyimpan seluruh data staff
    public $staffs = [];

    // Variabel publik untuk menyimpan seluruh data events
    // digunakan untuk pilihan dropdown event_id di form tambah/edit staff
    public $events = [];

    //Konstruktor
     
    public function __construct($db) {

        // Membuat objek model Staff untuk operasi CRUD
        $this->model = new Staff($db);

        // Membuat objek model Event untuk mengambil daftar event
        $this->eventModel = new Event($db);

        // Mengambil semua data staff dari tabel staff
        $this->staffs = $this->model->getAll();

        // Mengambil semua data event untuk digunakan pada form
        $this->events = $this->eventModel->getAll();
    }

    //Menghandle request untuk tambah, update, atau delete staff

    public function handleRequest() {

        // Mengecek apakah request berasal dari form via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Kondisi handle form tambah staff
            if (isset($_POST['create_staff'])) {

                // Menyimpan data staff baru ke database
                $this->model->create(
                    $_POST['name'],
                    $_POST['role'],
                    $_POST['event_id']
                );

                // Redirect agar tidak melakukan submit ulang ketika refresh
                header('Location: index.php?page=staffs');
                exit;
            }

            // Kondisi handle form edit staff
            if (isset($_POST['update_staff'])) {

                // Mengupdate data staff berdasarkan ID
                $this->model->update(
                    $_POST['id'],
                    $_POST['name'],
                    $_POST['role'],
                    $_POST['event_id']
                );

                // Redirect kembali ke halaman staff
                header('Location: index.php?page=staffs');
                exit;
            }
        }

        // Kondisi handle penghapusan staff lewat URL parameter GET
        if (isset($_GET['delete_staff'])) {

            // Menghapus data staff berdasarkan ID
            $this->model->delete($_GET['delete_staff']);

            // Redirect agar perubahan langsung terlihat
            header('Location: index.php?page=staffs');
            exit;
        }
    }

    //Fungsi mengambil satu data staff berdasarkan ID pada halaman form edit staff
  
    public function getStaff($id) {
        return $this->model->getById($id);
    }
}
