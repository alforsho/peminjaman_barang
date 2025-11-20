<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>

<h2>Data Barang</h2>

<a href="<?= base_url('barang/tambah'); ?>">+ Tambah Barang</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($barang as $b): ?>
    <tr>
        <td><?= $b->id_barang ?></td>
        <td><?= $b->nama_barang ?></td>
        <td><?= $b->jumlah ?></td> <!-- FIX DI SINI -->
        <td>
            <a href="<?= base_url('barang/edit/'.$b->id_barang); ?>">Edit</a> |
            <a href="<?= base_url('barang/hapus/'.$b->id_barang); ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
