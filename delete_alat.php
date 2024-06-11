<?php
// Connect to database
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get alat ID from POST request
$alat_id = isset($_POST['alat_id']) ? intval($_POST['alat_id']) : 0;

if ($alat_id > 0) {
    // Delete alat from database
    $sql = "DELETE FROM alat WHERE id = $alat_id";
    if ($mysqli->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
} else {
    echo "Invalid alat ID";
}

$mysqli->close();
header("Location: daftaralat.php"); // Redirect back to the alat list
exit();
?>
