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
?>
