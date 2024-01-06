<?php
session_start();

include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductDetails($conn, $productId);

    if ($product) {
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
                    <button class="btn btn-success" id="addToWishlist">Add to Wishlist</button>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('addToWishlist').addEventListener('click', function() {
                alert('Product added to wishlist!');
            });
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
