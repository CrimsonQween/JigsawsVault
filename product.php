<?php
session_start();
include "includes/header.php";
require_once "DB\dbfunctions.php";
require_once "DB\db.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductDetails($conn, $productId);

    if ($product) {
        // Check if the product is already in the wishlist
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
                    <?php if ($isInWishlist) { ?>
                        <button class="btn btn-success" disabled>Already in Wishlist</button>
                    <?php } else { ?>
                        <button class="btn btn-success addToWishlist" data-product-id="<?php echo $productId; ?>">Add to Wishlist</button>
                    <?php } ?>

                    <!-- Display Reviews -->
                    <div class="mt-3">
                        <h2>Customer Reviews</h2>
                        <?php
                        $reviews = getProductReviews($conn, $productId);
                        if ($reviews) {
                            foreach ($reviews as $review) {
                                echo '<p><strong>Rating: ' . $review['rating'] . '</strong></p>';
                                echo '<p>' . htmlspecialchars($review['comment']) . '</p>';
                                echo '<p><em>Posted on ' . $review['created_at'] . '</em></p>';
                            }
                        } else {
                            echo '<p>No reviews yet. Be the first to write a review!</p>';
                        }
                        ?>
                    </div>

<!-- Add Review Form -->
<div class="mt-3">
    <h2>Write a Review</h2>
    
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        ?>
        <form action="post_review.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Average</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="4" required></textarea>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
        <?php
    } else {
        echo '<p>Please log in to submit a review.</p>';
    }
    ?>
</div>
                </div>
            </div>
        </div>

        <script>
            // Use a class instead of ID for multiple buttons
            var wishlistButtons = document.querySelectorAll('.addToWishlist');
            wishlistButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.getAttribute('data-product-id');
                    addToWishlist(productId);
                });
            });

            function addToWishlist(productId) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'wishlist.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert('Product added to wishlist!');
                        // Reload the page or update the UI as needed
                        location.reload(); // This will refresh the page; you may need to adjust it based on your needs
                    }
                };
                xhr.send('action=add_to_wishlist&product_id=' + productId);
            }
        </script>
        <?php
    } else {
        echo "<p>Product not found</p>";
    }
} else {
    echo "<p>Invalid product ID</p>";
}

include "includes/footer.php";
?>
