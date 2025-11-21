<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            /* Background yang netral, profesional, dan terang */
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 35px;
            border-radius: 12px;
            width: 340px;
            /* Shadow yang lebih tajam dan profesional */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08); 
            border-top: 4px solid #00a896; /* Garis aksen hijau kebiruan */
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #212529; /* Teks gelap */
            font-weight: 500;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            color: #495057; /* Warna teks yang jelas */
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1px solid #ced4da; /* Border abu-abu netral */
            border-radius: 8px; 
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #00a896; /* Border fokus berubah ke warna aksen */
            outline: none;
            /* Efek fokus yang lembut */
            box-shadow: 0 0 0 0.2rem rgba(0, 168, 150, 0.25); 
        }

        button {
            width: 100%;
            padding: 14px;
            /* Warna aksen hijau kebiruan (Teal) */
            background: #00a896; 
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700; /* Lebih tebal */
            letter-spacing: 0.8px;
            text-transform: uppercase; /* Huruf kapital untuk profesionalitas */
            transition: background 0.3s, transform 0.1s;
        }

        button:hover {
            background: #00796b; /* Warna teal yang sedikit lebih gelap */
            transform: translateY(-1px);
        }

        .error {
            color: #dc3545; /* Merah untuk pesan error */
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="error"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/proses'); ?>">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>