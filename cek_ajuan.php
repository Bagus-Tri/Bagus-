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
        .return-home {
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <header>
        <h1>Cek Pengajuan</h1>
    </header>        
<!-- Return to Home Button -->
<form action="index.php" class="return-home">
    <button type="submit">Return to Home</button>
</form>
    <section>
        <div class="container">
            <div class="box" onclick="location.href='cek_kelas.php';">
                <img src="assets/logo-kelas.png" alt="Logo Kelas">
                <h3>Peminjaman Kelas</h3>
                <p>Untuk mengecek Peminjaman Ruang Kelas</p>
            </div>
            <div class="box" onclick="location.href='cek_buku.php';">
                <img src="assets/logo-buku.png" alt="Logo Buku">
                <h3>Peminjaman Buku</h3>
                <p>Untuk mengecek Peminjaman Buku</p>
            </div>
            <div class="box" onclick="location.href='cek_alat.php';">
                <img src="assets/logo-alat.png" alt="Logo Alat">
                <h3>Peminjaman Alat</h3>
                <p>Untuk mengecek Peminjaman Alat</p>
            </div>
        </div>
    </section>
</body>
</html>