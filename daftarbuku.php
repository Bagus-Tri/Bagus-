<?php
// Check if a session is already started and start it if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
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
        .book {
            display: inline-block;
            width: 200px;
            margin: 10px;
            text-align: center;
        }
        .book img {
            max-width: 150px;
            max-height: 200px;
        }
        .add-book-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-book-form {
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
    <h2>List Buku</h2>
    <div class="books-container">
        <?php include 'books.php'; ?>
    </div>
    <button class="submit-rent-form" onclick="location.href='pinjam_buku.php'">Pinjam Buku</button>
    <?php if ($isAdmin): ?>
        <button class="add-book-btn" onclick="toggleForm()">Tambah Buku</button>
        <div class="add-book-form" id="add-book-form">
            <h3>Add a Book</h3>
            <form id="book-form" method="post" action="add_book.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="book-name">Book Name:</label>
                    <input type="text" id="book-name" name="book-name" required>
                </div>
                <div class="form-group">
                    <label for="book-image">Book Image:</label>
                    <input type="file" id="book-image" name="book-image" accept="image/*" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    <?php endif; ?>
</div>

<script>
    function toggleForm() {
        var form = document.getElementById('add-book-form');
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
 