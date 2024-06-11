<!-- config.php -->
<?php
$host = 'localhost';
$username = 'bagustri';
$password = 'root';
$database = 'db_pinjam';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
