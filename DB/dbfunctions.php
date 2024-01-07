<?php
function getProducts($conn, $categories) {
    $sql = "SELECT p.id, p.name, p.categoryid, p.price, p.imagePath FROM products p
            JOIN category AS c ON  p.categoryid = c.id
            WHERE c.categoryname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $categories);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        // No products found
        echo "No products found for the selected category.";
        return [];
    }

    $products = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $products;
} 

function getCategories($conn) {
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProductDetails($conn, $productId) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No product found with the specified ID
        echo "Product not found.";
        return null;
    }

    $productDetails = $result->fetch_assoc();

    $stmt->close();

    return $productDetails;
}

function insertFormData($name, $email, $message) {
    $conn = connectToDatabase();

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

function addToCart($productId, $productName, $productPrice, $quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $productId) {
            $_SESSION['cart'][$index]['quantity'] += $quantity;
            $_SESSION['cart'][$index]['total'] = $item['price'] * $_SESSION['cart'][$index]['quantity'];
            return;
        }
    }

    $_SESSION['cart'][] = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $quantity,
        'total' => $productPrice * $quantity,
    );
}



function removeFromCart($productId) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['id'] == $productId) {
                // Remove the item from the cart
                unset($_SESSION['cart'][$index]);
                // Reset array keys to avoid gaps in the array
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                return;
            }
        }
    }
}

function getCartContents() {
    return isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : array();
}

function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "killersvault";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function addToWishlist($conn, $productId) {
    session_start();

    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    if (!in_array($productId, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $productId;
    }
}

function updateWishlist($conn) {
    $wishlistProducts = getWishlistProducts($conn, $_SESSION['wishlist']);

    foreach ($wishlistProducts as $product) {
        echo '<div class="row">';
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($product['imagePath']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
        echo '<p class="card-text">$' . htmlspecialchars($product['price']) . '</p>';
        echo '<form action="wishlist.php" method="post">';
        echo '<input type="hidden" name="action" value="remove_from_wishlist">';
        echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
        echo '<button type="submit" class="btn btn-outline-danger">Remove from Wishlist</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}



function getProductReviews($conn, $productId) {
    $sql = "SELECT * FROM product_reviews WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>


