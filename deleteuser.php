<?php
session_start();
require_once "DB\db.php";
require_once "DB\dbfunctions.php"; 

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login page if not logged in or not an admin
    exit();
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user based on the user ID
    if (deleteUser($conn, $userId)) {
        echo '<p>User deleted successfully.</p>';
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo '<p>Error deleting user.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>

