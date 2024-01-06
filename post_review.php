<?php
session_start();
require_once "DB\dbfunctions.php";
require_once "DB\db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page or handle it in your desired way
        header("Location: login.php");
        exit();
    }

    $productId = $_POST['product_id'];
    $userId = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    if ($productId && $userId && $rating && $comment) {
        // Insert the review into the database
        insertProductReview($conn, $productId, $userId, $rating, $comment);

        // Redirect back to the product page
        header("Location: product_page.php?id=$productId");
        exit();
    } else {
        // Handle validation errors or missing data
        echo "Invalid data. Please fill in all fields.";
    }
} else {
    // Handle non-POST requests
    echo "Invalid request method.";
}
?>