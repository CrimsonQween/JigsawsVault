<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'DB\db.php';
require_once 'DB\dbfunctions.php';

if (!isset($_SESSION['userId'])) {
    echo "<script>alert('Please Log in to add item to wishlist!');window.location.href='login.php';</script>";
    exit;
}

$userId = $_SESSION['userId'];
$productId = $_POST['productId'] ?? '';

// Check if the product is already in the wishlist
$sqlCheck = "SELECT * FROM wishlist WHERE userid = ? AND productid = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param("ii", $userId, $productId);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
    header("Location: product.php?id=" . $productId . "&inWishlist=true");
    exit();
} else {
    $sqlInsert = "INSERT INTO wishlist (userid, productid) VALUES (?, ?)";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param("ii", $userId, $productId);
    $stmtInsert->execute();

    header("Location: product.php?id=" . $productId . "&wishlist=true");
    exit();
}
?>