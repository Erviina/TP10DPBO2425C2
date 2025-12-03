<?php
// Mengimpor file model Client yang berisi query ke database
require_once __DIR__ . '/../models/Client.php';

class ClientViewModel {
    // Menyimpan instance model Client
    private $model;
    // Menyimpan seluruh data client dari database
    public $clients = [];

    // Konstruktor, dieksekusi saat kelas diinisialisasi
    public function __construct($db) {
        // Membuat objek model Client dengan koneksi database
        $this->model = new Client($db);
        // Mengambil seluruh data client dari tabel clients
        $this->clients = $this->model->getAll();
    }

    // Method untuk menangani request (input dari form atau URL)
    public function handleRequest() {

        // Mengecek apakah request berasal dari form menggunakan metode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Jika tombol create client ditekan (tambah data)
            if (isset($_POST['create_client'])) {
                // Memanggil fungsi create di model untuk memasukkan data ke DB
                $this->model->create($_POST['name'], $_POST['phone']);
                // Redirect setelah berhasil input untuk mencegah resubmit
                header('Location: index.php?page=clients');
                exit;
            }

            // Jika tombol update client ditekan (edit data)
            if (isset($_POST['update_client'])) {
                // Memanggil fungsi update berdasarkan ID client
                $this->model->update($_POST['id'], $_POST['name'], $_POST['phone']);
                // Redirect setelah update
                header('Location: index.php?page=clients');
                exit;
            }
        }

        // Mengecek apakah terdapat request GET untuk menghapus data
        if (isset($_GET['delete_client'])) {
            // Menghapus data client berdasarkan ID yang dikirim lewat URL
            $this->model->delete($_GET['delete_client']);
            // Redirect setelah delete
            header('Location: index.php?page=clients');
            exit;
        }
    }

    // Mengambil data client berdasarkan id (biasa dipakai untuk form edit)
    public function getClient($id) {
        return $this->model->getById($id);
    }
}
