<h2>Tambah Barang</h2>

<form method="post" action="<?= base_url('barang/simpan'); ?>">

<label>Nama Barang</label><br>
<input type="text" name="nama_barang" required><br><br>

<label>Stok</label><br>
<input type="number" name="jumlah" required><br><br>

<button type="submit">Simpan</button>
</form>
