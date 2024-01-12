<?php
require_once "DB/db.php"; 
require_once "DB/dbfunctions.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $userData = verifyUser($conn, $username, $password);

    if ($userData) {
        $userId = $userData["id"];
        $isAdmin = $userData["is_admin"];

        $_SESSION['userId'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $isAdmin; // Store is_admin in session

        if ($isAdmin) {
            header('Location: admin_dashboard.php'); // Redirect to admin page
            exit(); // Ensure no further code execution after redirect
        } else {
            header('Location: home.php'); // Redirect to user account page
            exit(); // Ensure no further code execution after redirect
        }
    } else {
        header('Location: login.php');
        exit(); // Ensure no further code execution after redirect
    }
}
?>
