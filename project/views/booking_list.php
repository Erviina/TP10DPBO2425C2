<?php require 'views/template/header.php'; ?>

<?php 
// Memproses request (tambah / update / delete) sebelum menampilkan data
$vm->handleRequest(); 
?>

<h2>Bookings</h2>

<!-- Tombol menuju form tambah booking -->
<a href="index.php?page=booking_form" class="btn-add">+ Tambah Booking</a>

<!-- Tabel daftar booking -->
<table>
    <tr>
        <th>Event</th>
        <th>Client</th>
        <th>Booked At</th>
        <th>Aksi</th>
    </tr>

    <!-- Looping data booking -->
    <?php foreach($vm->bookings as $b): ?>
    <tr>
        <!-- Menampilkan nama event -->
        <td><?= htmlspecialchars($b['event_name']) ?></td>

        <!-- Menampilkan nama client -->
        <td><?= htmlspecialchars($b['client_name']) ?></td>

        <!-- Menampilkan tanggal booking -->
        <td><?= htmlspecialchars($b['booked_at']) ?></td>

        <!-- Kolom aksi edit dan hapus -->
        <td class="actions">
            <!-- Link edit: membawa ID untuk diedit di form -->
            <a href="index.php?page=booking_form&id=<?= $b['id'] ?>">Edit |</a>

            <!-- Link hapus: menggunakan GET delete_booking -->
            <a href="index.php?page=bookings&delete_booking=<?= $b['id'] ?>" onclick="return confirm('Hapus booking?')">
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'views/template/footer.php'; ?>
