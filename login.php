<?php include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";
?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="login-container">
    <h2>Login</h2>
    <?php
    if (isset($_SESSION["login_error"])) {
        echo "<p>{$_SESSION["login_error"]}</p>";
        unset($_SESSION["login_error"]); // Clear the error message from session
    }
    ?>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name = "Action" value="Login">
    </form>

    <p>Don't have an account? <a href="register.php">Sign up here</a>.</p>
</div>

<?php include "includes/footer.php"; ?>
