<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
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
        <h2>Form Pengajuan Kelas</h2>
        <form method="post" action="submit_kelas.php">
            <div>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required maxlength="12">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="classroom">Kelas:</label>
                <input type="text" id="classroom" name="classroom" required>
            </div>
            <div>
                <label for="date">Tanggal:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div>
                <label for="start_time">Waktu Mulai:</label>
                <input type="time" id="start_time" name="start_time" required>
            </div>
            <div>
                <label for="finish_time">Waktu Selesai:</label>
                <input type="time" id="finish_time" name="finish_time" required>
            </div>
            <button type="submit">Ajukan Pengajuan</button>
        </form>
    </div>
    <!-- Return to Home Button -->
    <form action="index.php" class="return-home">
        <button type="submit">Return to Home</button>
    </form>
</body>
</html>
