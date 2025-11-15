<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Selamat datang, <?= $this->session->userdata('nama'); ?></h2>
<p>Role: <?= $this->session->userdata('role'); ?></p>

<a href="<?= base_url('logout'); ?>">Logout</a>

</body>
</html>
