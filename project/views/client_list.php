<?php require 'views/template/header.php'; ?>

<?php 
// Memproses request (hapus, tambah, edit) sebelum data ditampilkan
$vm->handleRequest(); 
?>

<!-- Judul halaman -->
<h2>Clients</h2>

<!-- Tombol untuk menambah data client -->
<a href="index.php?page=client_form" class="btn-add">+ Tambah Client</a>

<!-- Tabel daftar client -->
<table>
    <tr>
        <!-- Header kolom tabel -->
        <th>Nama</th>
        <th>Phone</th>
        <th>Aksi</th>
    </tr>

    <!-- Melakukan looping untuk menampilkan semua client -->
    <?php foreach($vm->clients as $c): ?>
    <tr>
        <!-- Menampilkan nama client dengan keamanan htmlspecialchars -->
        <td><?= htmlspecialchars($c['name']) ?></td>
        
        <!-- Menampilkan nomor telepon client -->
        <td><?= htmlspecialchars($c['phone']) ?></td>

        <!-- Kolom aksi (Edit dan Hapus) -->
        <td class="actions">

            <!-- Link untuk mengedit client berdasarkan ID -->
            <a href="index.php?page=client_form&id=<?= $c['id'] ?>">
                Edit    |
            </a>

            <!-- Link hapus client dengan konfirmasi popup -->
            <a 
                href="index.php?page=clients&delete_client=<?= $c['id'] ?>" 
                onclick="return confirm('Hapus client?')"
            >
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'views/template/footer.php'; ?>
