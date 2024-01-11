<?php
session_start();
require_once "DB\dbfunctions.php";
require_once "DB\db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert review into the database
    insertProductReview($conn, $productId, $userId, $rating, $comment);

    // Redirect back to the product page
    header("Location: product.php?id=$productId");
    exit();
} else {
    echo "<p>Invalid request</p>";
}
?>
