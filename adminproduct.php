<?php 
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

$categories = getCategories($conn);

include "includes/header.php"; 
?>

    <h2>Add Product</h2>
    
    <form action="process_product.php" method="post">
        <!-- Product Name -->
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <!-- Product Category -->
        <label for="categoryId">Category:</label>
                <select id="categoryId" name="categoryId" required>
                    <option value="">Select a Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['id']); ?>">
                                <?php echo htmlspecialchars($category['categoryname']); ?>
                            </option>
                        <?php endforeach; ?>
                </select>

        <!-- Product Description -->
        <label for="product_description">Product Description:</label>
        <textarea id="product_description" name="product_description" rows="4" required></textarea>

        <!-- Product Price -->
        <label for="product_price">Product Price:</label>
        <input type="number" id="product_price" name="product_price" step="0.01" required>

        <!-- Product Image -->
        <label for="product_image">Product Image:</label>
        <input type="text" id="product_image" name="product_image" accept="image/*">

        <!-- Submit Button -->
        <button type="submit">Save Product</button>
    </form>

<?php 
include "includes/footer.php"; 
?>
