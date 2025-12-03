<?php require 'views/template/header.php'; ?>

<?php
// Menangani request POST/GET (tambah, edit, hapus) sebelum data ditampilkan
$vm->handleRequest();

// Variabel untuk menampung data event yang sedang diedit
$event = null;

// Jika terdapat parameter "id" di URL, berarti user sedang melakukan edit data
if (isset($_GET['id'])) {
    // Ambil data event berdasarkan ID
    $event = $vm->getEvent($_GET['id']);
}
?>

<!-- Menampilkan judul halaman: Edit Event / Tambah Event -->
<h2><?= $event ? 'Edit' : 'Tambah' ?> Event</h2>

<!-- Form input event -->
<form method="post" action="index.php?page=event_form">

    <?php if ($event): ?>
        <!-- Menyimpan ID dalam input hidden untuk proses update -->
        <input type="hidden" name="id" value="<?= $event['id'] ?>">
    <?php endif; ?>

    <!-- Input nama event -->
    <label>Nama</label>
    <input 
        type="text" 
        name="name" 
        value="<?= $event ? htmlspecialchars($event['name']) : '' ?>" 
        required
    >

    <!-- Input tanggal event -->
    <label>Tanggal</label>
    <input 
        type="date" 
        name="date" 
        value="<?= $event ? $event['date'] : '' ?>" 
        required
    >

    <!-- Input lokasi event -->
    <label>Lokasi</label>
    <input 
        type="text" 
        name="location" 
        value="<?= $event ? htmlspecialchars($event['location']) : '' ?>" 
        required
    >

    <!-- Tombol submit: beda nama tombol untuk create atau update -->
    <?php if ($event): ?>
        <button type="submit" name="update_event">Update</button>
    <?php else: ?>
        <button type="submit" name="create_event">Simpan</button>
    <?php endif; ?>

</form>

<?php require 'views/template/footer.php'; ?>
