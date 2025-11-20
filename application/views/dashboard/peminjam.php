<h2>Dashboard Peminjam</h2>

<p>Selamat datang, <?= $this->session->userdata('nama'); ?></p>

<a href="<?= base_url('peminjaman'); ?>">Lihat Status Peminjaman</a> |
<a href="<?= base_url('peminjaman/ajukan'); ?>">Ajukan Peminjaman</a> |
<a href="<?= base_url('logout'); ?>">Logout</a>
