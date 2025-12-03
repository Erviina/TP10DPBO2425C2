<?php 
// Menangani request sebelum menampilkan data (tambah, update, hapus)
$vm->handleRequest(); 

// Memanggil template bagian atas (header HTML + menu navigasi)
require 'views/template/header.php'; 
?>
    
<h2>Events</h2>

<!-- Tombol untuk membuka form tambah event -->
<a href="index.php?page=event_form" class="btn-add">+ Tambah Event</a>

<!-- Tabel daftar event -->
<table>
    <tr>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($vm->events as $e): ?>
    <tr>
        <!-- Menampilkan nama event dengan htmlspecialchars untuk mencegah XSS -->
        <td><?= htmlspecialchars($e['name']) ?></td>

        <!-- Menampilkan tanggal event -->
        <td><?= htmlspecialchars($e['date']) ?></td>

        <!-- Menampilkan lokasi event -->
        <td><?= htmlspecialchars($e['location']) ?></td>

        <!-- Aksi edit & hapus -->
        <td class="actions">

            <!-- Link edit: akan mengarahkan ke form dengan parameter id -->
            <a href="index.php?page=event_form&id=<?= $e['id'] ?>">Edit |</a>

            <!-- Link hapus: terdapat konfirmasi sebelum delete -->
            <a 
                href="index.php?page=events&delete_event=<?= $e['id'] ?>" 
                onclick="return confirm('Hapus event?')"
            >
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Include template bagian bawah -->
<?php require 'views/template/footer.php'; ?>
