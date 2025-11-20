<h2>Daftar Peminjaman</h2>

<?php if ($this->session->userdata('role') == 'peminjam'): ?>
    <a href="<?= base_url('peminjaman/ajukan'); ?>">+ Ajukan Peminjaman</a>
<?php endif; ?>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Barang</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Status</th>
    <?php if ($this->session->userdata('role') == 'pengawas'): ?>
    <th>Aksi</th>
    <?php endif; ?>
</tr>

<?php foreach ($peminjaman as $p): ?>
<tr>
    <td><?= $p->id_peminjaman; ?></td>
    <td><?= $p->nama_barang; ?></td>
    <td><?= $p->jumlah; ?></td>
    <td><?= $p->tanggal_pinjam; ?></td>
    <td><?= $p->status; ?></td>

    <?php if ($this->session->userdata('role') == 'pengawas'): ?>
    <td>
        <a href="<?= base_url('peminjaman/approve/'.$p->id_peminjaman); ?>">Setujui</a> |
        <a href="<?= base_url('peminjaman/tolak/'.$p->id_peminjaman); ?>">Tolak</a>
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; ?>

</table>
