<?php require 'views/template/header.php'; ?>

<?php
// Menangani request (tambah, edit, hapus staff)
$vm->handleRequest();

// Variabel untuk menyimpan data staff jika sedang edit
$staff = null;

// Jika ada parameter id pada URL, ambil data staff berdasarkan id
if (isset($_GET['id'])) {
    $staff = $vm->getStaff($_GET['id']);
}
?>

<!-- Judul halaman: menyesuaikan apakah form edit atau tambah -->
<h2><?= $staff ? 'Edit' : 'Tambah' ?> Staff</h2>

<!-- Form input staff -->
<form method="post" action="index.php?page=staff_form">

    <?php if ($staff): ?>
        <!-- Hidden input agar ID ikut terkirim ketika update -->
        <input type="hidden" name="id" value="<?= $staff['id'] ?>">
    <?php endif; ?>

    <!-- Input nama staff -->
    <label>Nama</label>
    <input 
        type="text" 
        name="name" 
        value="<?= $staff ? htmlspecialchars($staff['name']) : '' ?>" 
        required
    >

    <!-- Input role staff -->
    <label>Role</label>
    <input 
        type="text" 
        name="role" 
        value="<?= $staff ? htmlspecialchars($staff['role']) : '' ?>"
    >

    <!-- Pilihan event yang dihandle oleh staff -->
    <label>Event</label>
    <select name="event_id">
        <option value="">-- Pilih Event --</option>
        <?php foreach($vm->events as $e): ?>
            <option 
                value="<?= $e['id'] ?>"
                <?= $staff && $staff['event_id'] == $e['id'] ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($e['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Tombol submit menyesuaikan mode -->
    <?php if ($staff): ?>
        <button type="submit" name="update_staff">Update</button>
    <?php else: ?>
        <button type="submit" name="create_staff">Simpan</button>
    <?php endif; ?>
</form>

<?php require 'views/template/footer.php'; ?>
