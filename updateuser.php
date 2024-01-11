<?php
session_start();
require_once "DB\db.php";
require_once "DB\dbfunctions.php"; // Include your database functions

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login page if not logged in or not an admin
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $newRole = $_POST['role'];

    // Update the user's role in the database
    if (editUser($conn, $userId, $newRole)) {
        echo '<p>User role updated successfully.</p>';
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
    } else {
        echo '<p>Error updating user role.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}

?>
