<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form submitted!"; // Check if the form is being submitted
    
    // Handle form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your database connection code
    $mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

    // Check if username already exists
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $mysqli->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo "Username already exists.";
    } else {
        // Insert new user into database
        $insert_query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
        if ($mysqli->query($insert_query) === TRUE) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user'; // Default role for new users
            $mysqli->close();
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Sign Up</button>
        </div>
    </form>
    <p>Already have an account? <a href="signin.php">Sign in</a></p>
</body>
</html>