<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'DB\db.php'; 

    $productName = $_POST['product_name'];
    $categoryId = $_POST['categoryId'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $productImage = $_POST['product_image'];

    // SQL to insert data into products table
    $sql = "INSERT INTO products (name, categoryid, price, description, imagePath) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisds", $productName, $categoryId, $price, $description, $productImage);

    if ($stmt->execute()) {
        echo "<script>
                alert('Product added successfully.');
                window.location.href='adminproduct.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
