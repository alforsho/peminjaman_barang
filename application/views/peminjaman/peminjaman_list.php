<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
</head>
<body>

<h2>Daftar Peminjaman</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Barang</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($peminjaman as $d): ?>
    <tr>
        <td><?= $no++; ?></td>

        <!-- ❗ INI YANG FIX: kolom nama berasal dari users.nama -->
        <td><?= $d->nama; ?></td>

        <td><?= $d->nama_barang; ?></td>
        <td><?= $d->tanggal_pinjam; ?></td>
        <td><?= $d->status; ?></td>

        <td>
            <?php if($d->status == 'Menunggu'): ?>
                <a href="<?= base_url('peminjaman/approve/'.$d->id_peminjaman); ?>">Setujui</a>
                |
                <form action="<?= base_url('peminjaman/tolak/'.$d->id_peminjaman); ?>" method="post" style="display:inline;">
                    <input type="text" name="alasan" placeholder="Alasan..." required>
                    <button type="submit">Tolak</button>
                </form>
            <?php endif; ?>
        </td>

    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
