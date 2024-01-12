<?php
function getProducts($conn, $categories = null) {
    $sql = "SELECT p.id, p.name, p.categoryid, p.price, p.imagePath FROM products p";

    // If categories are specified, join with the category table and filter by category
    if ($categories !== null) {
        $sql .= " JOIN category AS c ON p.categoryid = c.id WHERE c.categoryname = ?";
    }

    $stmt = $conn->prepare($sql);

    // Bind parameters only if categories are specified
    if ($categories !== null) {
        $stmt->bind_param("s", $categories);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No products found
        echo "No products found.";
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



function getCountries() {
    global $conn;

    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);

    $countries = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $countries[] = $row;
        }
    }

    return $countries;
}

// Function to get cities based on the selected country
function getCitiesByCountry($countryId) {
    global $conn;

    $sql = "SELECT * FROM cities WHERE country_id = $countryId";
    $result = $conn->query($sql);

    $cities = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cities[] = $row;
        }
    }

    return $cities;
}

// Function to get streets based on the selected city
function getStreetsByCity($cityId) {
    global $conn;

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM streets WHERE city_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cityId);
    $stmt->execute();

    $result = $stmt->get_result();

    $streets = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $streets[] = $row;
        }
    }

    $stmt->close();

    return $streets;
}


function Get3Prod($limit = 3) {
    global $conn;

    $sql = "SELECT id, name, price, imagePath FROM Products LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();

    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $products;
}

function getUserWishlist($conn, $userId){
    $sql = "SELECT p.* FROM wishlist w 
    JOIN products p ON w.productid = p.id 
    WHERE w.userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
return $result->fetch_all(MYSQLI_ASSOC);
}

function removeItemFromWishlist($conn, $userId, $productIdToRemove) {
    $query = "DELETE FROM wishlist WHERE userid = ? AND productid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $productIdToRemove);

    if ($stmt->execute()) {
        // Wishlist item removed successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}

function verifyUser($conn, $username, $password) {
    $sql = "SELECT id, is_admin, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['password'] === $password) {
            return array("id" => $user['id'], "is_admin" => $user['is_admin']);
        }
    }
    return false;
}



function addProduct($conn, $name, $categoryid, $price, $imagePath) {
    $sql = "INSERT INTO products (name, categoryid, price, imagePath) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sids", $name, $categoryid, $price, $imagePath);

    if ($stmt->execute()) {
        // Product added successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}

function editProduct($conn, $productId, $name, $categoryid, $price, $imagePath) {
    $sql = "UPDATE products SET name = ?, categoryid = ?, price = ?, imagePath = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sidsi", $name, $categoryid, $price, $imagePath, $productId);

    if ($stmt->execute()) {
        // Product updated successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}


function deleteProduct($conn, $productId) {
    // Delete related records from the order_items table
    $orderItemsDeleteSql = "DELETE FROM order_items WHERE product_id = ?";
    $orderItemsStmt = $conn->prepare($orderItemsDeleteSql);
    $orderItemsStmt->bind_param("i", $productId);

    if (!$orderItemsStmt->execute()) {
        // Handle the error if necessary
        return false;
    }

    // Now, delete the product from the products table
    $productDeleteSql = "DELETE FROM products WHERE id = ?";
    $productStmt = $conn->prepare($productDeleteSql);
    $productStmt->bind_param("i", $productId);

    if ($productStmt->execute()) {
        // Product deleted successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}



function getUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // No users found
        return [];
    }
}


function editUser($conn, $userId, $newRole) {
    $sql = "UPDATE users SET is_admin = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $newRole, $userId);

    if ($stmt->execute()) {
        // User role updated successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}

function deleteUser($conn, $userId) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // User deleted successfully
        return true;
    } else {
        // Error occurred
        return false;
    }
}

function getOrders($conn) {
    $sql = "SELECT o.order_id, o.customer_name, GROUP_CONCAT(p.name SEPARATOR ', ') AS product_names, o.total_with_shipping, o.status 
            FROM orders o
            LEFT JOIN order_items oi ON o.order_id = oi.order_id
            LEFT JOIN products p ON oi.product_id = p.id
            GROUP BY o.order_id, o.customer_name, o.total_with_shipping, o.status";

    $result = $conn->query($sql);

    $orders = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    return $orders;
}

function updateOrderStatus($conn, $orderId, $newStatus) {
    $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("ss", $newStatus, $orderId);

    if (!$stmt->execute()) {
        echo "Error executing query: " . $stmt->error;
        return false;
    }

    return true;
}


function getUsersFromDatabase() {
    global $conn;

    $users = array();

    $query = "SELECT id, username, email, is_admin FROM users";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_free_result($result);

    return $users;
}

function getUserDetails($conn, $userId) {
    $sql = "SELECT id, username, email, is_admin FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No user found with the specified ID
        return null;
    }

    $userDetails = $result->fetch_assoc();

    $stmt->close();

    return $userDetails;
}

function getProductById($conn, $productId) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}

function cancelOrder($conn, $order_id) {
    $order_id = mysqli_real_escape_string($conn, $order_id);

    $deleteOrderItemsQuery = "DELETE FROM order_items WHERE order_id = $order_id";

    if (mysqli_query($conn, $deleteOrderItemsQuery)) {
        $deleteOrderQuery = "DELETE FROM orders WHERE order_id = $order_id";

        if (mysqli_query($conn, $deleteOrderQuery)) {
            return true;
        } else {
            echo "Error deleting order: " . mysqli_error($conn);
            return false;
        }
    } else {
        echo "Error deleting order items: " . mysqli_error($conn);
        return false;
    }
}

function getReviewsForProduct($conn, $productId) {
    $sql = "SELECT * FROM product_reviews WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


function insertReview($conn, $productId, $userId, $rating, $comment) {
    $sql = "INSERT INTO product_reviews (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $productId, $userId, $rating, $comment);
    $stmt->execute();
}


function addUser($username, $email, $password, $isAdmin) {
    global $conn; // Assuming $conn is your database connection

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $hashedPassword, $isAdmin);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}


?>




