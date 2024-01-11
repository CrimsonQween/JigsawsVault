<?php

require_once "DB\db.php";
require_once "DB\dbfunctions.php"; 

// Check if the form is submitted for adding/editing/deleting a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addProduct"])) {
        // Add Product
        $name = $_POST["name"];
        $categoryid = $_POST["categoryid"];
        $price = $_POST["price"];
        $imagePath = $_POST["imagePath"];

        if (addProduct(connectToDatabase(), $name, $categoryid, $price, $imagePath)) {
            echo "Product added successfully";
        } else {
            echo "Error adding the product";
        }
    } elseif (isset($_POST["editProduct"])) {
        // Edit Product
        $productId = $_POST["productId"];
        $name = $_POST["name"];
        $categoryid = $_POST["categoryid"];
        $price = $_POST["price"];
        $imagePath = $_POST["imagePath"];

        if (editProduct(connectToDatabase(), $productId, $name, $categoryid, $price, $imagePath)) {
            echo "Product edited successfully";
        } else {
            echo "Error editing the product";
        }
    } elseif (isset($_POST["deleteProduct"])) {
        // Delete Product
        $productId = $_POST["productId"];

        if (deleteProduct(connectToDatabase(), $productId)) {
            echo "Product deleted successfully";
        } else {
            echo "Error deleting the product";
        }
    }
}

include "includes/header.php";?>

<!-- Add Product Form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br>

    <label for="categoryid">Category:</label>
    <select name="categoryid" required>
        <?php
        // Fetch categories from the database and populate the dropdown
        $categories = getCategories(connectToDatabase());

        foreach ($categories as $category) {
            echo "<option value=\"{$category['id']}\">{$category['categoryname']}</option>";
        }
        ?>
    </select><br>

    <label for="price">Price:</label>
    <input type="text" name="price" required><br>

    <label for="imagePath">Image Path:</label>
    <input type="text" name="imagePath" required><br>

    <input type="submit" name="addProduct" value="Add Product">
</form>

<!-- Edit/Delete Product Form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="productId">Select Product:</label>
    <select name="productId" required>
        <?php
        // Fetch products from the database and populate the dropdown
        $products = getProducts(connectToDatabase());

        foreach ($products as $product) {
            echo "<option value=\"{$product['id']}\">{$product['name']}</option>";
        }
        ?>
    </select><br>

    <input type="submit" name="selectProduct" value="Select Product">

    <?php
    // Check if a product is selected
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectProduct"])) {
        $selectedProductId = $_POST["productId"];
        $selectedProduct = getProductById(connectToDatabase(), $selectedProductId);

        // Display existing product details for editing
        if ($selectedProduct) {
            echo "<label for=\"name\">Product Name:</label>";
            echo "<input type=\"text\" name=\"name\" value=\"{$selectedProduct['name']}\"><br>";

            echo "<label for=\"categoryid\">Category:</label>";
            echo "<select name=\"categoryid\" required>";
            $categories = getCategories(connectToDatabase());
            foreach ($categories as $category) {
                $selected = ($category['id'] == $selectedProduct['categoryid']) ? 'selected' : '';
                echo "<option value=\"{$category['id']}\" $selected>{$category['categoryname']}</option>";
            }
            echo "</select><br>";

            echo "<label for=\"price\">Price:</label>";
            echo "<input type=\"text\" name=\"price\" value=\"{$selectedProduct['price']}\"><br>";

            echo "<label for=\"imagePath\">Image Path:</label>";
            echo "<input type=\"text\" name=\"imagePath\" value=\"{$selectedProduct['imagePath']}\"><br>";

            // Include the hidden field for passing productId to the next step
            echo "<input type=\"hidden\" name=\"selectedProductId\" value=\"{$selectedProductId}\">";
        }
    }
    ?>

    <input type="submit" name="editProduct" value="Edit Product">
    <input type="submit" name="deleteProduct" value="Delete Product">
</form>


<?php
include "includes/footer.php";
?>
