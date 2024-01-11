<?php
session_start();
require_once "DB\dbfunctions.php";
require_once "DB\db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    // You should add validation and sanitation for user inputs here

    // Insert the review into the database
    $userId = $_SESSION["user_id"]; // Assuming you have a user authentication system
    insertReview($conn, $productId, $userId, $rating, $comment); // Implement this function in dbfunctions.php

    header("Location: product.php?id=$productId"); // Redirect back to the product page
    exit();
} else {
    echo "Invalid request.";
}
?>
