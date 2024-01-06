<?php include "includes/header.php"; ?>

<div>
    <h2>Sign Up</h2>
    <form action="process_registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Sign Up">
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</div>

<?php include "includes/footer.php"; ?> 