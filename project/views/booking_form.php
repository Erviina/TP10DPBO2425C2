<?php require 'views/template/header.php'; ?> 
<?php
// Memanggil fungsi handleRequest untuk memproses submit form (POST / GET)
$vm->handleRequest();

// Variabel untuk menyimpan data booking yang sedang diedit
$booking = null;

// Jika terdapat parameter id di URL, berarti mode Edit
if (isset($_GET['id'])) {
    // Ambil data booking berdasarkan ID untuk ditampilkan ke form
    $booking = $vm->getBooking($_GET['id']);
}
?>

<!-- Judul halaman: otomatis berubah menjadi Edit atau Tambah -->
<h2><?= $booking ? 'Edit' : 'Tambah' ?> Booking</h2>

<!-- Form submit dengan metode POST -->
<form method="post" action="index.php?page=booking_form">

    <?php if ($booking): ?>
        <!-- Hidden input untuk menyimpan ID booking saat mode Edit -->
        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
    <?php endif; ?>

    <!-- Input pilih event -->
    <label>Event</label>
    <select name="event_id" required>
        <option value="">-- Pilih Event --</option>

        <!-- Loop data event dari ViewModel -->
        <?php foreach($vm->events as $e): ?>

            <!-- Menampilkan event sebagai pilihan dropdown -->
            <!-- Jika sedang edit, pilih event yang sesuai dengan data lama -->
            <option value="<?= $e['id'] ?>"
                <?= $booking && $booking['event_id']==$e['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($e['name']) ?> (<?= $e['date'] ?>)
            </option>

        <?php endforeach; ?>
    </select>

    <!-- Input pilih client -->
    <label>Client</label>
    <select name="client_id" required>
        <option value="">-- Pilih Client --</option>

        <!-- Loop data client dari ViewModel -->
        <?php foreach($vm->clients as $c): ?>

            <!-- Menampilkan client sebagai pilihan dropdown -->
            <!-- Selected jika sedang mode Edit -->
            <option value="<?= $c['id'] ?>"
                <?= $booking && $booking['client_id']==$c['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['name']) ?>
            </option>

        <?php endforeach; ?>
    </select>

    <!-- Input tanggal booking -->
    <label>Booked At</label>

    <!-- Jika edit tampilkan tanggal lama, jika tambah pakai tanggal hari ini -->
    <input type="date" name="booked_at"
        value="<?= $booking ? $booking['booked_at'] : date('Y-m-d') ?>"
        required>

    <!-- Tombol submit berubah tergantung mode -->
    <?php if ($booking): ?>
        <!-- Tombol untuk update booking -->
        <button type="submit" name="update_booking">Update</button>
    <?php else: ?>
        <!-- Tombol untuk simpan (create) booking baru -->
        <button type="submit" name="create_booking">Simpan</button>
    <?php endif; ?>

</form>

<?php require 'views/template/footer.php'; ?> 
