<?php
require_once "DB\dbfunctions.php";

if (isset($_SESSION['wishlist']) && is_array($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {
    $wishlistProducts = getWishlistProducts($conn, $_SESSION['wishlist']);

    foreach ($wishlistProducts as $product) {
        ?>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                        <p class="card-text">$<?php echo htmlspecialchars($product['price']); ?></p>
                        <form action="wishlist.php" method="post">
                            <input type="hidden" name="action" value="remove_from_wishlist">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-outline-danger">Remove from Wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>Your wishlist is empty</p>";
}
?>