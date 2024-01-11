<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}

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

<script>
        function removeItem(itemId) {
            if (confirm("Are you sure you want to remove this item from your wishlist?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        location.reload(); 
                    }
                };
                xhr.open("GET", "remove_item.php?itemId=" + itemId, true);
                xhr.send();
            }
        }
    </script>


</head>
<body>

    <h1>My Wishlist</h1>

        <ul id="wishlist">

        <?php foreach ($myWishlist as $item): ?>

    <li class="wishlist-item">
        <img src="<?php echo htmlspecialchars($item['imagePath']); ?>" alt="Product Image">
        <span><?php echo htmlspecialchars($item['name']); ?></span>
        <span><?php echo htmlspecialchars("€" . $item['price']); ?></span>
        <button class="remove-btn" onclick="removeItem(<?php echo $item['id']; ?>)">Remove</button>
    </li>

    <?php endforeach; ?>
    
        </ul>


</body>
</html>


<?php include "includes/footer.php"; ?>

