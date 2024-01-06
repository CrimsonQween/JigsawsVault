<?php include "includes/header.php"; ?>

<link rel="stylesheet" type="text/css" href="styles.css">

<div class="login-container">
    <h2>Login</h2>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>

    <?php
    // Check if login_success is set in the session or any other way you store it in your process_login.php file
    if (isset($login_success) && $login_success) {
        // Redirect to the account page
        header("Location: account.php");
        exit(); // Make sure to exit after the header() function to prevent further execution
    } elseif (isset($login_success) && !$login_success) {
        // Handle unsuccessful login
        echo "Login failed. Please try again.";
    }
    ?>
    
    <p>Don't have an account? <a href="register.php">Sign up here</a>.</p>
</div>

<?php include "includes/footer.php"; ?>
