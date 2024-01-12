<?php
session_start();
include "DB\db.php";
include "DB\dbfunctions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $userId = $_SESSION['userId'];

    if (removeItemFromWishlist($conn, $userId, $productId)) {
        echo "Product removed from wishlist successfully!";
        
        // Redirect back to the wishlist page
        header("Location: wishlist.php");
        exit();
    } else {
        echo "Error removing product from wishlist: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
