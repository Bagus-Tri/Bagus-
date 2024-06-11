<?php
/// Establish database connection
$host = "localhost";
$username = "bagustri";
$password = "root";
$database = "db_pinjam";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// Update status if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $update_query = "UPDATE pengajuan_kelas SET status='$status' WHERE id=$id";
    mysqli_query($connection, $update_query);
}

// Fetch submissions from database
$query = "SELECT * FROM pengajuan_kelas";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Pengajuan Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .status-form {
            width: 100%;
        }
        .return-home {
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Review Pengajuan Kelas</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            // Loop through each submission and display its details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['classroom'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['finish_time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<form method='post' class='status-form'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<select name='status'>";
                echo "<option value='Belum Disetujui'>Belum Disetujui</option>";
                echo "<option value='Ditolak'>Ditolak</option>";
                echo "<option value='Disetujui'>Disetujui</option>";
                echo "</select>";
                echo "<button type='submit'>Update</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <!-- Return to Home Button -->
<form action="index.php" class="return-home">
    <button type="submit">Return to Home</button>
</form>
</body>
</html>

<?php
// Close connection
mysqli_close($connection);
?>