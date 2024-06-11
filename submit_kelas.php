<?php
// Establish database connection
$host = "localhost";
$username = "bagustri";
$password = "root";
$database = "db_pinjam";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $classroom = $_POST['classroom'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $finish_time = $_POST['finish_time'];

    // Insert submission into pengajuan_kelas table
    $insert_query = "INSERT INTO pengajuan_kelas (name, nim, email, classroom, date, start_time, finish_time, status) VALUES ('$name', '$nim', '$email', '$classroom', '$date', '$start_time', '$finish_time', 'Belum Disetujui')";

    if (mysqli_query($connection, $insert_query)) {
        // Show alert and redirect back to the form page
        echo "<script>alert('Form berhasil dibuat'); window.location.href = 'pinjam_kelas.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close connection
mysqli_close($connection);
?>
