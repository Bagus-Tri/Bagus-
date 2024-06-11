<?php
// Establish database connection
$connection = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if form is submitted and update status if necessary
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $sql_update = "UPDATE pengajuan_buku SET status='$status' WHERE id='$id'";
    if ($connection->query($sql_update) === TRUE) {
        // Status updated successfully
        echo '<script>alert("Status updated successfully.");</script>';
    } else {
        echo "Error updating status: " . $connection->error;
    }
}

// Query to fetch form submissions
$sql = "SELECT * FROM pengajuan_buku";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Rental Requests</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
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

<h2>Review Peminjaman Buku</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Email</th>
        <th>Nama Buku</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["nim"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["nama_buku"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>";
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
            echo '<select name="status" class="status-form">';
            echo '<option value="Belum Disetujui">Belum Disetujui</option>';
            echo '<option value="Ditolak">Ditolak</option>';
            echo '<option value="Disetujui">Disetujui</option>';
            echo '</select>';
            echo '<button type="submit">Update</button>';
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    ?>
</table>
<form action="index.php" class="return-home">
    <button type="submit">Return to Home</button>
</body>
</html>

<?php
// Close database connection
$connection->close();
?>
