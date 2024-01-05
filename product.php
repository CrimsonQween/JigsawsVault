<?php
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductDetails($conn, $productId); // You need to implement this function

    if ($product) {
        // Display product details
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

                    <!-- Buy Now Button -->
                    <a href="#" class="btn btn-primary">Buy Now</a>

                    <!-- Wishlist Button -->
                    <button class="btn btn-success" id="addToWishlist">Add to Wishlist</button>
                </div>
            </div>
        </div>

        <script>
            // You may want to use JavaScript to handle the wishlist functionality
            document.getElementById('addToWishlist').addEventListener('click', function() {
                // You can implement the logic to add the product to the wishlist here
                // For example, you can use AJAX to send a request to the server to update the user's wishlist
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
