<h2>Ajukan Peminjaman Barang</h2>

<form method="post" action="<?= base_url('peminjaman/simpan'); ?>">

    <!-- id peminjam dari session -->
    <input type="hidden" name="id_peminjam" value="<?= $this->session->userdata('id_user'); ?>">

    <label>Pilih Barang</label><br>
    <select name="id_barang" required>
        <?php foreach ($barang as $b): ?>
            <option value="<?= $b->id_barang; ?>">
                <?= $b->nama_barang; ?> (jumlah: <?= $b->jumlah; ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Jumlah</label><br>
    <input type="number" name="jumlah" min="1" required><br><br>

    <button type="submit">Ajukan</button>
</form>
