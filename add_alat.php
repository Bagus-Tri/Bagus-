<?php
// Connect to the database
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$name = isset($_POST['alat_name']) ? $_POST['alat_name'] : '';
$image = isset($_FILES['alat-image']) ? $_FILES['alat-image'] : null;

// Check if name and image are provided and image upload is successful
if (!empty($name) && $image && $image['error'] === 0) {
    // Check file type (assuming only images are allowed)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowed_types)) {
        echo "Invalid file type. Only JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Define the target directory and file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Prepare and bind the SQL statement to prevent SQL injection
        $sql = "INSERT INTO alat (name, image) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $name, $target_file);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to the alat list upon success
            header("Location: daftaralat.php");
            exit();
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Alat name and image are required.";
}

// Close the database connection
$mysqli->close();
?>
