<?php
include "DB\db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $isAdmin = isset($_POST['is_admin']) ? 1 : 0; // Check if the checkbox is checked

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $email, $password, $isAdmin);

    if ($stmt->execute()) {
        // Registration successful, redirect to login page or any other page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
}
?>