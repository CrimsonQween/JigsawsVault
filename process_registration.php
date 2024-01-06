<?php
include "DB\db.php";

// Assuming your db.php file contains the $connection variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username is already taken
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        // Username is already taken
        echo "Username is already taken. Please choose another.";
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            echo "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>
