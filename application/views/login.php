<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

<style>
    /* Import Google Font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        /* Warna yang mengutamakan Kepercayaan (Trust) dan Stabilitas */
        --primary-color: #007bff; /* Corporate Blue */
        --secondary-color: #004d99; /* Deep Navy Blue */
        --text-color: #212529; /* Darker text for professionalism */
        --card-bg: #ffffff;
        --shadow-color: rgba(0, 77, 153, 0.2);
        --input-border: #ced4da;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        /* Latar Belakang Gradien Stabil & Profesional */
        background: linear-gradient(135deg, #00416a, #4a90e2);
        transition: background-color 0.3s ease;
    }

    .card {
        width: 360px; /* Sedikit lebih besar untuk kesan kokoh */
        padding: 40px;
        border-radius: 12px;
        background: var(--card-bg);
        box-shadow: 0 8px 25px var(--shadow-color);
        text-align: center;
        animation: fadeIn 0.6s ease-out;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-top: 5px solid var(--primary-color); /* Garis atas sebagai aksen korporat */
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0, 65, 106, 0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h3 {
        margin-bottom: 30px;
        font-size: 26px;
        color: var(--secondary-color); /* Judul menggunakan Navy Blue */
        font-weight: 700;
        letter-spacing: 0.8px;
    }

    .form-input {
        width: 100%;
        height: 50px;
        padding: 0 16px;
        margin-bottom: 18px;

        border: 1px solid var(--input-border);
        border-radius: 8px;
        background-color: #f8f9fa; /* Light background for input */

        font-size: 16px;
        color: var(--text-color);
        transition: all 0.3s ease;
    }

    .form-input::placeholder {
        color: #adb5bd;
    }

    .form-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
        outline: none;
    }

    .btn-login {
        width: 100%;
        height: 55px;
        margin-top: 10px;

        /* Warna Tombol Biru Korporat Solid */
        background: var(--primary-color);
        border: none;
        border-radius: 8px;

        font-size: 17px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        letter-spacing: 0.5px;

        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background: var(--secondary-color); /* Navy Blue pada hover */
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(0, 77, 153, 0.4);
    }

    .btn-login:active {
        transform: translateY(1px);
    }

    .alert {
        /* Warna Merah yang lebih "resmi" untuk error */
        background: #dc3545;
        padding: 15px;
        border-radius: 6px;
        color: white;
        margin-bottom: 25px;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(-10px); }
        to { opacity: 1; transform: translateX(0); }
    }
</style>
</head>

<body>

<div class="card">

    <h3>Login</h3>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('auth/proses'); ?>" method="post">
        <input type="text" class="form-input" name="username" placeholder="Username" required>
        <input type="password" class="form-input" name="password" placeholder="Password" required>

        <button type="submit" class="btn-login">Login</button>
    </form>

</div>

</body>
</html>
