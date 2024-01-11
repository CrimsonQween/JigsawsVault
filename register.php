<?php include "includes/header.php"; ?>

<div>
    <h2>Sign Up</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $isAdmin = isset($_POST['is_admin']) ? 1 : 0; // Check if the checkbox is checked

        echo "<p>Thank you for signing up, $username! You will receive an email shortly at $email.</p>";
    } else {
    ?>
        <form action="process_registration.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="is_admin">Sign up as admin:</label>
            <input type="checkbox" name="is_admin">

            <input type="submit" value="Sign Up">
        </form>
    <?php } ?>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</div>


<?php include "includes/footer.php"; ?>
