<?php
session_start();
include "includes/header.php";
require_once "DB\dbfunctions.php";

// Check if the action is to add to the wishlist
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}

// Check if the action is to add to the wishlist
if (isset($_POST['action']) && $_POST['action'] === 'add_to_wishlist') {
    // Get the product ID from the POST data
    $productId = $_POST['product_id'];

    // Check if the product is not already in the wishlist
    if (!in_array($productId, $_SESSION['wishlist'])) {
        // Add the product ID to the wishlist
        $_SESSION['wishlist'][] = $productId;
    }
}

// Check if the action is to remove from the wishlist
if (isset($_POST['action']) && $_POST['action'] === 'remove_from_wishlist') {
    // Get the product ID from the POST data
    $productId = $_POST['product_id'];

    // Check if the product is in the wishlist
    $wishlistIndex = array_search($productId, $_SESSION['wishlist']);
    if ($wishlistIndex !== false) {
        // Remove the product from the wishlist
        unset($_SESSION['wishlist'][$wishlistIndex]);
        // Reset array keys
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
    }
}

// Wishlist Page
?>
<body>
    <section class="container mt-4">
        <h2>Your Wishlist</h2>

        <?php
        // Check if $_SESSION['wishlist'] is an array
        if (isset($_SESSION['wishlist']) && is_array($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {
            // Get product details for items in the wishlist
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
    </section>

    <!-- Bootstrap JS and Popper.js (Optional, depending on your requirements) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php include "includes/footer.php"; ?>

