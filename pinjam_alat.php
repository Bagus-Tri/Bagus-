<?php
// Database connection
$host = "localhost";
$username = "bagustri";
$password = "root";
$database = "db_pinjam";

// Create connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $alat = $_POST['alat_name'];
    $waktu_pinjam = $_POST['waktu_pinjam'];
    $waktu_kembali = $_POST['waktu_kembali'];

    // Insert data into pengajuan_alat table
    $sql = "INSERT INTO pengajuan_alat (nama, nim, email, alat, waktu_pinjam, waktu_kembali) 
            VALUES ('$nama', '$nim', '$email', '$alat', '$waktu_pinjam', '$waktu_kembali')";
    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Form berhasil dibuat");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pinjam Alat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .submit-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .return-home {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pinjam Alat</h2>
    <form id="rent-tool-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="alat_name">Nama Alat:</label>
            <input type="text" id="alat_name" name="alat_name" required>
        </div>
        <div class="form-group">
            <label for="waktu_pinjam">Waktu Pinjam:</label>
            <input type="datetime-local" id="waktu_pinjam" name="waktu_pinjam" required>
        </div>
        <div class="form-group">
            <label for="waktu_kembali">Waktu Kembali:</label>
            <input type="datetime-local" id="waktu_kembali" name="waktu_kembali" required>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>

<!-- Return to Home Button -->
<form action="daftaralat.php" class="return-home">
    <button type="submit">Kembali ke List Alat</button>
</form>

</body>
</html>
