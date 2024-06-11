<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your database connection code
    $mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

    // Check if username and password match
    $check_user_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $check_user_result = $mysqli->query($check_user_query);

    if ($check_user_result->num_rows == 1) {
        // User authenticated successfully
        $_SESSION['username'] = $username;
        $user_data = $check_user_result->fetch_assoc();
        $_SESSION['role'] = $user_data['role']; // Set user role
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h2>Sign In</h2>
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
            <button type="submit">Sign In</button>
        </div>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</body>
</html>
