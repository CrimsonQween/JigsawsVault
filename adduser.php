<?php
session_start();
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login page if not logged in or not an admin
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and add a new user
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $newRole = isset($_POST['is_admin']) ? 1 : 0;

    // Add the new user to the database
    if (addUser($newUsername, $newEmail, $newPassword, $newRole)) {
        echo '<p>New user added successfully.</p>';
    } else {
        echo '<p>Error adding the new user.</p>';
    }
}

// Display the new user form
?>
<div class="add-user-form">
    <h2>Add New User</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="is_admin">Role:</label>
        <input type="checkbox" id="is_admin" name="is_admin">
        <label for="is_admin">Admin</label>

        <button type="submit">Add User</button>
    </form>
</div>

<?php
include "includes/footer.php";
?>
