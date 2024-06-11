<?php
// Connect to database
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get book ID from POST request
$book_id = isset($_POST['book_id']) ? intval($_POST['book_id']) : 0;

if ($book_id > 0) {
    // Delete book from database
    $sql = "DELETE FROM books WHERE id = $book_id";
    if ($mysqli->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
} else {
    echo "Invalid book ID";
}

$mysqli->close();
header("Location: index.php"); // Redirect back to the book list
exit();
?>
