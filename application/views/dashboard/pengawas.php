<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pengawas</title>
    <style>
        /* --- General Setup --- */
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f9; 
            margin: 0;
            min-height: 100vh;
            display: flex; /* Mengaktifkan Flexbox untuk layout sidebar */
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
            color: #00a896; /* Warna Aksen Teal */
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
        
        /* Gaya khusus untuk Logout */
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
            margin-bottom: 40px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 15px;
        }

        h2 {
            color: #212529;
            font-weight: 700;
            font-size: 2em;
            margin: 0;
        }
        
        .welcome-message {
            color: #495057;
            font-size: 1.1em;
            font-weight: 400;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">APLIKASI PEMINJAMAN</div>
    <div class="nav-menu">
        <a href="<?= base_url('dashboard'); ?>" class="active">
            <span class="icon">🏠</span> Dashboard
        </a>
        <hr style="border: 0; border-top: 1px solid #f0f0f0; margin: 10px 20px;">

        <a href="<?= base_url('barang'); ?>">
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
        <h2>Dashboard Pengawas</h2>
    </div>

    <p class="welcome-message">
        Selamat datang, **<?= $this->session->userdata('nama'); ?>**. Gunakan menu di samping untuk mengelola inventaris dan memproses pengajuan peminjaman.
    </p>

    </div>

</body>
</html>