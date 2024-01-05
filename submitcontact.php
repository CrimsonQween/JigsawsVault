<?php
require_once "DB\db.php";

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is set
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($conn, "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Redirect to the thank you page
    header("thankyou.php");
    exit();
} else {
    // Handle the case where the query execution fails
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    die("Error executing the query");
}
?>
