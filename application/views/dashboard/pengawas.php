<h2>Dashboard Pengawas</h2>

<p>Selamat datang, <?= $this->session->userdata('nama'); ?></p>

<a href="<?= base_url('barang'); ?>">Kelola Barang</a> |
<a href="<?= base_url('peminjaman'); ?>">Daftar Pengajuan</a> |
<a href="<?= base_url('logout'); ?>">Logout</a>
