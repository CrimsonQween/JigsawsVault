<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_type'])) {
    header("Location: login.php");
    exit();
}

// Display dashboard content based on user type
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h2>Welcome to the Dashboard</h2>

    <?php
    // Display user type
    echo '<p>User Type: ' . $_SESSION['user_type'] . '</p>';
    ?>

    <a href="logout.php">Logout</a>

</body>
</html>
