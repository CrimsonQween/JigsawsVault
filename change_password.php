<?php
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['userId'])) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPassword = $_POST["new_password"] ?? "";

    // Validate and update the password in the database
    $success = changePassword($conn, $_SESSION['userId'], $newPassword);

    if ($success) {
        echo "<p>Password changed successfully!</p>";
    } else {
        echo "<p>Error changing password. Please try again.</p>";
    }
}

?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="change-password-container">
    <h2>Change Password</h2>
    <form action="change_password.php" method="post">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>

        <input type="submit" value="Change Password">
    </form>
</div>

<?php include "includes/footer.php"; ?>
