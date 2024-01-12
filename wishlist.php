<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "DB\db.php";
require_once "DB\dbfunctions.php";

$userId = $_SESSION['userId'];
$myWishlist = getUserWishlist($conn, $userId);

include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <h1>My Wishlist</h1>

    <ul id="wishlist">
    <?php foreach ($myWishlist as $item): ?>
        <li id="wishlist-item-<?php echo $item['id']; ?>" class="wishlist-item">
            <img src="<?php echo htmlspecialchars($item['imagePath']); ?>" alt="Product Image">
            <span><?php echo htmlspecialchars($item['name']); ?></span>
            <span><?php echo htmlspecialchars("€" . $item['price']); ?></span>
            <form method="post" action="remove_wishlist_item.php">
                <input type="hidden" name="productId" value="<?php echo $item['id']; ?>">
                <button type="submit" class="remove-btn">Remove</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>

<?php include "includes/footer.php"; ?>
