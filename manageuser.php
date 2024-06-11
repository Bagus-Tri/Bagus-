<?php
// Database connection
$mysqli = new mysqli("localhost", "bagustri", "root", "db_pinjam");

// CRUD Operations
// Read Operation
$result = $mysqli->query("SELECT * FROM users");

// Create Operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $mysqli->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    header("Location: ".$_SERVER['PHP_SELF']);
}

// Update Operation (Change Role)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST['id'];
    $role = $_POST['role'];

    $mysqli->query("UPDATE users SET role='$role' WHERE id=$id");
    header("Location: ".$_SERVER['PHP_SELF']);
}

// Delete Operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST['id'];

    $mysqli->query("DELETE FROM users WHERE id=$id");
    header("Location: ".$_SERVER['PHP_SELF']);
}

?>

<!-- HTML Table to Display Users -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    form {
        margin-top: 20px;
    }

    input, select, button {
        margin-bottom: 10px;
        padding: 5px;
    }

    .return-home {
        margin-top: 20px;
    }
</style>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <select name="role">
                        <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                    </select>
                    <button type="submit" name="update">Change Role</button>
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- Form for Adding Users -->
<form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="password" placeholder="Password">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <button type="submit" name="create">Add User</button>
</form>

<!-- Return to Home Button -->
<form action="index.php" class="return-home">
    <button type="submit">Return to Home</button>
</form>
