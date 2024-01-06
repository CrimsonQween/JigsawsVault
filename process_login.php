<?php
include "DB\db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login successful, set a session variable or any other method to indicate success
        session_start();
        $_SESSION["login_success"] = true;
        
        // Redirect to the account page
        header("Location: account.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password";
    }
}
?>
