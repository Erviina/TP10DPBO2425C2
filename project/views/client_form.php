<?php require 'views/template/header.php'; ?>

<?php
// Memproses request form (tambah / edit / hapus) sebelum halaman ditampilkan
$vm->handleRequest();

// Variabel untuk menampung data client saat mode edit
$client = null;

// Jika terdapat parameter id di URL, berarti form sedang dalam mode edit
if (isset($_GET['id'])) {
    // Ambil data client berdasarkan id
    $client = $vm->getClient($_GET['id']);
}
?>

<!-- Judul halaman, menyesuaikan apakah menambah atau mengedit -->
<h2><?= $client ? 'Edit' : 'Tambah' ?> Client</h2>

<!-- Form input client -->
<form method="post" action="index.php?page=client_form">

    <?php if ($client): ?>
        <!-- Hidden input untuk menyimpan id client ketika update -->
        <input type="hidden" name="id" value="<?= $client['id'] ?>">
    <?php endif; ?>

    <!-- Input Nama -->
    <label>Nama</label>
    <input 
        type="text" 
        name="name" 
        value="<?= $client ? htmlspecialchars($client['name']) : '' ?>" 
        required
    >

    <!-- Input Nomor Telepon -->
    <label>Phone</label>
    <input 
        type="text" 
        name="phone" 
        value="<?= $client ? htmlspecialchars($client['phone']) : '' ?>"
    >

    <!-- Tombol submit: menyesuaikan mode tambah atau update -->
    <?php if ($client): ?>
        <button type="submit" name="update_client">Update</button>
    <?php else: ?>
        <button type="submit" name="create_client">Simpan</button>
    <?php endif; ?>
</form>

<?php require 'views/template/footer.php'; ?>
