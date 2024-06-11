<?php
// Check if a session is already started and start it if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Connect to database
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch items from 'alat' table
$sql = "SELECT * FROM alat";
$result = $mysqli->query($sql);

// Output items
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<p>' . $row["name"] . '</p>';
        if ($isAdmin) {
            echo '<form method="post" action="delete_alat.php">';
            echo '<input type="hidden" name="alat_id" value="' . $row["id"] . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
        }
        echo '</div>';
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>
