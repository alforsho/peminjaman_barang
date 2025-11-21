<!DOCTYPE html>
<html>
<head>
    <title>Ajukan Peminjaman</title>
    <style>
        /* --- General Setup --- */
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f9; 
            margin: 0;
            min-height: 100vh;
            display: flex; 
        }

        /* --- Sidebar Navigation (Konsisten) --- */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            flex-shrink: 0;
        }

        .logo {
            color: #00a896; 
            font-size: 1.2em; /* Disesuaikan agar sesuai 'APLIKASI PEMINJAMAN' */
            font-weight: 800;
            text-align: center;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            text-decoration: none;
            color: #495057;
            font-weight: 500;
            border-left: 5px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background-color: #e6f7f5;
            color: #00a896;
            border-left-color: #00a896;
        }

        .nav-menu .icon {
            margin-right: 10px;
            font-size: 1.2em;
        }
        
        .nav-menu .dashboard-link {
            border-left-color: transparent;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .nav-menu .dashboard-link:hover {
            color: #00a896;
            background-color: #f0f8ff;
            border-left-color: #00a896;
        }

        .nav-menu .logout-link {
            color: #dc3545;
            margin-top: 30px;
            border-left-color: transparent;
        }

        .nav-menu .logout-link:hover {
            background-color: #ffe6e6;
            color: #dc3545;
            border-left-color: #dc3545;
        }

        /* --- Main Content and Form Styling --- */

        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .header {
            margin-bottom: 25px; /* Disesuaikan untuk tombol kembali */
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 15px;
        }

        h2 {
            color: #212529;
            font-weight: 700;
            font-size: 2em;
            margin: 0;
            margin-bottom: 10px; /* Jarak antara judul dan tombol kembali */
        }
        
        /* Gaya Tombol Kembali (Back Button) */
        .btn-back {
            display: inline-block;
            text-decoration: none;
            background-color: #6c757d; /* Warna abu-abu netral */
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9em;
            transition: background-color 0.2s;
            margin-bottom: 10px;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Gaya Kontainer Form */
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            max-width: 500px; 
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            margin-top: 15px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.2s;
        }

        input[type="number"]:focus,
        select:focus {
            border-color: #00a896;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 168, 150, 0.1);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            background: #00a896; 
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            text-transform: uppercase;
            transition: background 0.2s;
        }

        button[type="submit"]:hover {
            background: #00796b;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">APLIKASI PEMINJAMAN</div>
    <div class="nav-menu">
        <a href="<?= base_url('dashboard/peminjam'); ?>" class="dashboard-link">
            <span class="icon">🏠</span> Kembali ke Dashboard
        </a>
        <hr style="border: 0; border-top: 1px solid #f0f0f0; margin: 10px 20px;">
        
        <a href="<?= base_url('peminjaman'); ?>">
            <span class="icon">📊</span> Daftar Peminjaman
        </a>
        <a href="<?= base_url('peminjaman/ajukan'); ?>" class="active">
            <span class="icon">📝</span> Ajukan Peminjaman
        </a>
        <a href="<?= base_url('logout'); ?>" class="logout-link">
            <span class="icon">➡️</span> Logout
        </a>
    </div>
</div>

<div class="main-content">
    
    <div class="header">
        <h2>Ajukan Peminjaman Barang</h2>
    </div>

    <div class="form-container">
        <form method="post" action="<?= base_url('peminjaman/simpan'); ?>">

            <input type="hidden" name="id_peminjam" value="<?= $this->session->userdata('id_user'); ?>">

            <label for="id_barang">Pilih Barang</label>
            <select name="id_barang" id="id_barang" required>
                <?php foreach ($barang as $b): ?>
                    <option value="<?= $b->id_barang; ?>">
                        <?= $b->nama_barang; ?> (Tersedia: <?= $b->jumlah; ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="jumlah">Jumlah yang Dipinjam</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>

            <button type="submit">Ajukan Peminjaman</button>
        </form>
    </div>
</div>

</body>
</html>