<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman</title>
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
            font-size: 1.2em; 
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
        
        /* Penyesuaian lebar kolom aksi */
        .data-table th:last-child {
            width: 300px; /* Lebar lebih besar untuk menampung form Tolak */
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
            font-size: 0.95em;
            vertical-align: top;
        }

        .data-table tr:hover {
            background-color: #f7f9fb;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        /* Gaya Kolom Status */
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: 600;
            color: white;
        }

        .status-badge.menunggu {
            background-color: #ffc107; 
            color: #333;
        }

        .status-badge.disetujui {
            background-color: #28a745; 
        }

        .status-badge.ditolak, .status-badge.dikembalikan {
            background-color: #dc3545; 
        }

        /* Gaya Form Aksi (Input dan Tombol Tolak) */
        .data-table form {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .data-table input[type="text"] {
            padding: 6px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 0.9em;
            width: 120px;
        }

        /* Tombol Setujui */
        .action-link.approve {
            text-decoration: none;
            color: white;
            background-color: #00a896;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.2s;
        }
        .action-link.approve:hover {
            background-color: #00796b;
        }

        /* Tombol Tolak */
        .data-table button[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .data-table button[type="submit"]:hover {
            background-color: #c82333;
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

        <a href="<?= base_url('barang'); ?>">
            <span class="icon">📦</span> Kelola Barang
        </a>
        <a href="<?= base_url('peminjaman'); ?>" class="active">
            <span class="icon">📋</span> Daftar Pengajuan
        </a>
        
        <a href="<?= base_url('logout'); ?>" class="logout-link">
            <span class="icon">➡️</span> Logout
        </a>
    </div>
</div>

<div class="main-content">
    
    <div class="header">
        <h2>Daftar Peminjaman</h2>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($peminjaman as $d): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->nama; ?></td>
                <td><?= $d->nama_barang; ?></td>
                <td><?= $d->tanggal_pinjam; ?></td>
                <td>
                    <?php 
                        // Logika untuk menentukan kelas warna status
                        $status_text = strtolower($d->status);
                        $status_class = '';
                        if (strpos($status_text, 'menunggu') !== false) {
                            $status_class = 'menunggu';
                        } elseif (strpos($status_text, 'setuju') !== false) {
                            $status_class = 'disetujui';
                        } elseif (strpos($status_text, 'tolak') !== false || strpos($status_text, 'kembali') !== false) {
                            $status_class = 'ditolak';
                        }
                    ?>
                    <span class="status-badge <?= $status_class; ?>">
                        <?= $d->status; ?>
                    </span>
                </td>

                <td>
                    <?php if($d->status == 'Menunggu'): ?>
                        <a href="<?= base_url('peminjaman/approve/'.$d->id_peminjaman); ?>" class="action-link approve">Setujui</a>
                        <br><br> <form action="<?= base_url('peminjaman/tolak/'.$d->id_peminjaman); ?>" method="post" style="display:inline;">
                            <input type="text" name="alasan" placeholder="Alasan penolakan..." required>
                            <button type="submit">Tolak</button>
                        </form>
                    <?php endif; ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>