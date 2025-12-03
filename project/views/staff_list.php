<?php require 'views/template/header.php'; ?>

<?php 
// Menangani request CRUD (hapus atau update jika ada)
$vm->handleRequest(); 
?>

<!-- Judul halaman -->
<h2>Staff</h2>

<!-- Tombol ke halaman form untuk tambah staff -->
<a href="index.php?page=staff_form" class="btn-add">+ Tambah Staff</a>

<!-- Tabel daftar staff -->
<table>
    <tr>
        <th>Nama</th>
        <th>Role</th>
        <th>Event</th>
        <th>Aksi</th>
    </tr>

    <!-- Loop menampilkan semua data staff -->
    <?php foreach($vm->staffs as $s): ?>
    <tr>
        <!-- Nama staff (aman dengan htmlspecialchars) -->
        <td><?= htmlspecialchars($s['name']) ?></td>

        <!-- Role / jabatan staff -->
        <td><?= htmlspecialchars($s['role']) ?></td>

        <!-- Nama event yang di-handle staff (diambil melalui join tabel) -->
        <td><?= htmlspecialchars($s['event_name']) ?></td>

        <!-- Aksi edit & hapus -->
        <td class="actions">

            <!-- Link ke form edit staff dengan parameter id -->
            <a href="index.php?page=staff_form&id=<?= $s['id'] ?>">Edit |</a>

            <!-- Link untuk menghapus data staff Memakai konfirmasi agar tidak salah klik -->
            <a 
                href="index.php?page=staffs&delete_staff=<?= $s['id'] ?>" 
                onclick="return confirm('Hapus staff?')"
            >
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'views/template/footer.php'; ?>
