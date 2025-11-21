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
            display: flex; /* Mengaktifkan Flexbox untuk layout sidebar */
        }

        /* --- Sidebar Navigation --- */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            flex-shrink: 0;
        }

        .logo {
            color: #00a896; /* Warna Aksen Teal */
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
        
        /* Gaya Khusus untuk Kembali ke Dashboard */
        .nav-menu .dashboard-link {
            border-left-color: transparent;
            font-weight: 600; /* Sedikit lebih tebal */
            margin-bottom: 10px; /* Jarak dengan menu berikutnya */
        }
        .nav-menu .dashboard-link:hover {
            color: #00a896;
            background-color: #f0f8ff; /* Warna hover lebih lembut */
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

        /* --- Main Content and Header --- */

        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .header {
            /* Hapus justify-content: space-between karena tombol '+ Ajukan Peminjaman' dihapus */
            display: flex; 
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

        /* Gaya Tombol Ajukan Peminjaman (dibiarkan ada, tapi tidak digunakan di header) */
        .btn-ajukan {
            text-decoration: none;
            background-color: #00a896;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-ajukan:hover {
            background-color: #00796b;
        }

        /* --- Tabel Modern --- */

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

        /* Gaya untuk Kolom Status */
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: 600;
            color: white;
        }

        .status-badge.pending {
            background-color: #ffc107; 
            color: #333;
        }

        .status-badge.disetujui {
            background-color: #28a745; 
        }

        .status-badge.ditolak, .status-badge.dikembalikan {
            background-color: #dc3545; 
        }
        
        /* Gaya Tombol Aksi (Pengawas) */
        .action-link {
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
            transition: color 0.2s;
        }

        .action-link.approve {
            color: #00a896;
        }

        .action-link.approve:hover {
            color: #00796b;
        }

        .action-link.tolak {
            color: #dc3545;
        }

        .action-link.tolak:hover {
            color: #c82333;
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
        
        <a href="<?= base_url('peminjaman'); ?>" class="active">
            <span class="icon">📊</span> Daftar Peminjaman
        </a>
        <a href="<?= base_url('peminjaman/ajukan'); ?>">
            <span class="icon">📝</span> Ajukan Peminjaman
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
                <th>ID</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Status</th>
                <?php if ($this->session->userdata('role') == 'pengawas'): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjaman as $p): ?>
            <tr>
                <td><?= $p->id_peminjaman; ?></td>
                <td><?= $p->nama_barang; ?></td>
                <td><?= $p->jumlah; ?></td>
                <td><?= $p->tanggal_pinjam; ?></td>
                <td>
                    <?php 
                        // Logika untuk menentukan kelas warna status
                        $status_text = strtolower($p->status);
                        $status_class = '';
                        if (strpos($status_text, 'menunggu') !== false) {
                            $status_class = 'pending';
                        } elseif (strpos($status_text, 'setuju') !== false) {
                            $status_class = 'disetujui';
                        } elseif (strpos($status_text, 'tolak') !== false) {
                            $status_class = 'ditolak';
                        } elseif (strpos($status_text, 'kembali') !== false) {
                            $status_class = 'dikembalikan';
                        }
                    ?>
                    <span class="status-badge <?= $status_class; ?>">
                        <?= $p->status; ?>
                    </span>
                </td>

                <?php if ($this->session->userdata('role') == 'pengawas'): ?>
                <td>
                    <a href="<?= base_url('peminjaman/approve/'.$p->id_peminjaman); ?>" class="action-link approve">Setujui</a>
                    <a href="<?= base_url('peminjaman/tolak/'.$p->id_peminjaman); ?>" class="action-link tolak">Tolak</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>