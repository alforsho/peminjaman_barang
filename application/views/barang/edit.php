<h2>Edit Barang</h2>

<form method="post" action="<?= base_url('barang/update'); ?>">
<input type="hidden" name="id_barang" value="<?= $barang->id_barang; ?>">

<label>Nama Barang</label><br>
<input type="text" name="nama_barang" value="<?= $barang->nama_barang; ?>" required><br><br>

<label>Stok</label><br>
<input type="number" name="jumlah" value="<?= $barang->jumlah; ?>" required><br><br>

<button type="submit">Update</button>
</form>
