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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .item {
            display: inline-block;
            width: 200px;
            margin: 10px;
            text-align: center;
        }
        .item img {
            max-width: 150px;
            max-height: 200px;
        }
        .add-item-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-item-form {
            display: none;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .return-home {
            margin-top: 20px;
        }
        .submit-rent-form {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>List Alat</h2>
    <div class="items-container">
        <?php 
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
        ?>
    </div>
    <button class="submit-rent-form" onclick="location.href='pinjam_alat.php'">Pinjam Alat</button>
    <?php if ($isAdmin): ?>
    <button class="add-item-btn" onclick="toggleForm()">Tambah Alat</button>
    <div class="add-item-form" id="add-item-form" style="display: none;">
        <h3>Tambah Alat</h3>
        <form id="item-form" method="post" action="add_alat.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="alat_name">Item Name:</label>
                <input type="text" id="alat_name" name="alat_name" required>
            </div>
            <div class="form-group">
                <label for="alat-image">Item Image:</label>
                <input type="file" id="alat-image" name="alat-image" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php endif; ?>
</div>

<script>
    function toggleForm() {
        var form = document.getElementById('add-item-form');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>

<!-- Return to Home Button -->
<form action="index.php" class="return-home">
    <button type="submit">Return to Home</button>
</form>
</body>
</html>

<?php
$mysqli->close();
?>
