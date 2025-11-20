<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if ($this->session->flashdata('error')): ?>
<p style="color:red"><?= $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<form method="post" action="<?= base_url('login/proses'); ?>">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
