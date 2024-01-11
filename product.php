<?php
session_start();
include "includes/header.php";
require_once "DB\dbfunctions.php";
require_once "DB\db.php";

// Initialize $userId
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductDetails($conn, $productId);

    $reviews = getReviewsForProduct($conn, $productId);

    if ($product) {
        $isInWishlist = false;
        if (isset($_SESSION['wishlist']) && is_array($_SESSION['wishlist']) && in_array($productId, $_SESSION['wishlist'])) {
            $isInWishlist = true;
        }
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" class="img-fluid mx-auto my-2" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </div>
                <div class="col-md-6">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                    <p>$<?php echo htmlspecialchars($product['price']); ?></p>
                    
                    <!-- Add description display -->
                    <p><?php echo htmlspecialchars($product['description']); ?></p>

                    <!-- Add to Cart Button -->
                    <form action="shoppingcart.php" method="post">
                        <input type="hidden" name="action" value="add_to_cart"> 
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                    </form>

                    <!-- Wishlist Button -->
                    <form action="processwishlist.php" method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <button class="btn btn-secondary" type="submit">Add to Wishlist</button>
                    </form>

<!-- Display Existing Reviews -->
<div class="mt-4">
    <h3>Product Reviews</h3>
    <?php
    if ($reviews) {
        foreach ($reviews as $review) {
            echo "<p><strong>User:</strong> " . htmlspecialchars($review['user_id']) . "</p>";
            echo "<p><strong>Rating:</strong> " . htmlspecialchars($review['rating']) . "/5</p>";
            echo "<p><strong>Comment:</strong> " . htmlspecialchars($review['comment']) . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No reviews yet.</p>";
    }
    ?>
</div>

<!-- Add Review Form -->
<div class="mt-4">
    <h3>Add Your Review</h3>
    <form action="processreview.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" rows="4" required></textarea>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>  

        <?php
    } else {
        echo "<p>Product not found</p>";
    }
} else {
    echo "<p>Invalid product ID</p>";
}

include "includes/footer.php";
?>