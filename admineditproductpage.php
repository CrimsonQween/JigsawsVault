<?php

require_once "DB\db.php";
require_once "DB\dbfunctions.php"; 

// Check if the form is submitted for adding/editing/deleting a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addProduct"])) {
        // Add Product
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $categoryid = isset($_POST["categoryid"]) ? $_POST["categoryid"] : null;
        $price = isset($_POST["price"]) ? $_POST["price"] : null;
        $imagePath = isset($_POST["imagePath"]) ? $_POST["imagePath"] : null;

        if (addProduct(connectToDatabase(), $name, $categoryid, $price, $imagePath)) {
            echo "Product added successfully";
        } else {
            echo "Error adding the product";
        }
    } elseif (isset($_POST["editProduct"])) {
        // Edit Product
        $productId = isset($_POST["productId"]) ? $_POST["productId"] : null;
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $categoryid = isset($_POST["categoryid"]) ? $_POST["categoryid"] : null;
        $price = isset($_POST["price"]) ? $_POST["price"] : null;
        $imagePath = isset($_POST["imagePath"]) ? $_POST["imagePath"] : null;

        if (editProduct(connectToDatabase(), $productId, $name, $categoryid, $price, $imagePath)) {
            echo "Product edited successfully";
        } else {
            echo "Error editing the product";
        }
    } elseif (isset($_POST["deleteProduct"])) {
        // Delete Product
        $productId = isset($_POST["productId"]) ? $_POST["productId"] : null;

        if (deleteProduct(connectToDatabase(), $productId)) {
            echo "Product deleted successfully";
        } else {
            echo "Error deleting the product";
        }
    }
}

include "includes/header.php";
?>

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
</form>

<?php
// Check if a product is selected
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectProduct"])) {
    $selectedProductId = isset($_POST["productId"]) ? $_POST["productId"] : null;
    $selectedProduct = getProductById(connectToDatabase(), $selectedProductId);

    // Display existing product details for editing and deleting
    if ($selectedProduct) {
        echo "<form method=\"post\" action=\"{$_SERVER['PHP_SELF']}\">";

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

        // Submit button to submit the edited product details
        echo "<input type=\"submit\" name=\"editProduct\" value=\"Edit Product\">";

        // Delete button to delete the selected product
        echo "<input type=\"submit\" name=\"deleteProduct\" value=\"Delete Product\">";

        echo "</form>";
    }
}

// Check if the form is submitted for deleting a product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteProduct"])) {
    $selectedProductId = isset($_POST["selectedProductId"]) ? $_POST["selectedProductId"] : null;

    // Delete the product from the database
    if (deleteProduct(connectToDatabase(), $selectedProductId)) {
        echo "Product deleted successfully";
        // Optionally, you can redirect the user or display a message here.
    } else {
        echo "Error deleting the product";
    }
}
?>
</form>

<?php
include "includes/footer.php";
?>
