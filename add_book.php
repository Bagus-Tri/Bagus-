<?php
// Connect to database
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$name = isset($_POST['book-name']) ? $_POST['book-name'] : '';
$image = isset($_FILES['book-image']) ? $_FILES['book-image'] : null;

if (!empty($name) && $image) {
    // Define the target directory and file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Insert into database
        $sql = "INSERT INTO books (name, image) VALUES ('$name', '$target_file')";
        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Book name and image are required.";
}

$mysqli->close();
header("Location: daftarbuku.php"); // Redirect back to the book list
exit();
?>
