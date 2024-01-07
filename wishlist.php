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
    <section class="container mt-4" id="wishlist-container">
        <?php include "wishlist_content.php"; ?>
    </section>

    <!-- Bootstrap JS and Popper.js (Optional, depending on your requirements) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    var wishlistButtons = document.querySelectorAll('.addToWishlist');
    wishlistButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            addToWishlist(<?php echo $productId; ?>);
        });
    });

    function addToWishlist(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'wishlist.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                updateWishlist();
                alert('Product added to wishlist!');
            }
        };
        xhr.send('action=add_to_wishlist&product_id=' + productId);
    }

    function updateWishlist() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'wishlist_content.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('wishlist-container').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

</body>

</html>

<?php include "includes/footer.php"; ?>

