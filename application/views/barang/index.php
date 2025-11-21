<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        /* --- General Setup --- */
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f9; 
            margin: 0;
            min-height: 100vh;
            display: flex; 
        }

        /* --- Sidebar Navigation (Konsisten dengan Dashboard Pengawas) --- */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            flex-shrink: 0;
        }

        .logo {
            color: #00a896; 
            font-size: 1.5em;
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

        /* --- Main Content and Table Styling --- */

        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 15px;
        }

        h2 {
            color: #212529;
            font-weight: 700;
            font-size: 2em;
            margin: 0;
        }

        /* Gaya Tombol Tambah Barang */
        .btn-tambah {
            text-decoration: none;
            background-color: #00a896;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-tambah:hover {
            background-color: #00796b;
        }

        /* Gaya Tabel Modern */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .data-table th {
            background-color: #f0f8ff; 
            color: #212529;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
            font-size: 0.95em;
        }

        .data-table tr:hover {
            background-color: #f7f9fb;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        /* Gaya Tombol Aksi */
        .action-link {
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
            transition: color 0.2s;
        }

        .action-link.edit {
            color: #007bff; /* Biru untuk Edit */
        }

        .action-link.edit:hover {
            color: #0056b3;
        }

        .action-link.hapus {
            color: #dc3545; /* Merah untuk Hapus */
        }
        
        .action-link.hapus:hover {
            color: #c82333;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">APLIKASI PEMINJAMAN</div>
    <div class="nav-menu">
        <a href="<?= base_url('dashboard/pengawas'); ?>" class="dashboard-link">
            <span class="icon">🏠</span> Kembali ke Dashboard
        </a>
        <hr style="border: 0; border-top: 1px solid #f0f0f0; margin: 10px 20px;">

        <a href="<?= base_url('barang'); ?>" class="active">
            <span class="icon">📦</span> Kelola Barang
        </a>
        <a href="<?= base_url('peminjaman'); ?>">
            <span class="icon">📋</span> Daftar Pengajuan
        </a>
        
        <a href="<?= base_url('logout'); ?>" class="logout-link">
            <span class="icon">➡️</span> Logout
        </a>
    </div>
</div>

<div class="main-content">
    
    <div class="header">
        <h2>Data Barang</h2>
        <a href="<?= base_url('barang/tambah'); ?>" class="btn-tambah">+ Tambah Barang</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td><?= $b->id_barang ?></td>
                <td><?= $b->nama_barang ?></td>
                <td><?= $b->jumlah ?></td> 
                <td>
                    <a href="<?= base_url('barang/edit/'.$b->id_barang); ?>" class="action-link edit">Edit</a>
                    <a href="<?= base_url('barang/hapus/'.$b->id_barang); ?>" onclick="return confirm('Yakin ingin menghapus barang ini?')" class="action-link hapus">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>