<?php
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user'; // Default to 'user' if 'role' is not set
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null; // Get the username if set

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
        }
        .auth-buttons {
            margin-right: 20px;
        }
        .auth-buttons button {
            margin-left: 10px;
        }
        section {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 50px;
        }

        .box {
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .box img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Website Peminjaman</h1>
    </header>
    <nav>
        <div>
          <?php if (isset($username)) : ?>
                <div class="dropdown">
                    <button><?php echo "Hi, $username"; ?></button>
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="auth-buttons">
                    <button onclick="location.href='signup.php';">Sign Up</button>
                    <button onclick="location.href='signin.php';">Sign In</button>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="box" onclick="location.href='pinjam_kelas.php';">
                <img src="assets/logo-kelas.png" alt="Logo Kelas">
                <h3>Peminjaman Kelas</h3>
                <p>Untuk mengajukan Peminjaman Ruang Kelas</p>
            </div>
            <div class="box" onclick="location.href='daftarbuku.php';">
                <img src="assets/logo-buku.png" alt="Logo Buku">
                <h3>Peminjaman Buku</h3>
                <p>Untuk mengajukan Peminjaman Buku</p>
            </div>
            <div class="box" onclick="location.href='daftaralat.php';">
                <img src="assets/logo-alat.png" alt="Logo Alat">
                <h3>Peminjaman Alat</h3>
                <p>Untuk mengajukan Peminjaman Alat</p>
            </div>
        </div>
    </section>
    <?php if ($role == 'admin') : ?>
    <section>
        <div class="container">
            <div class="box" onclick="location.href='manageuser.php';">
                <h3>Managemen User</h3>
                <p>Untuk melakukan Manajemen User</p>
            </div>
            <div class="box" onclick="location.href='cek_ajuan.php';">
                <h3>Cek Pengajuan</h3>
                <p>Untuk mengecek pengajuan peminjaman yang telah dikirim</p>
            </div>
        </div>
    </section>
    <?php endif; ?>
</body>
</html>
