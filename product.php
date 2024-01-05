<?php
    include "includes/header.php";
    require_once "DB\db.php";
    require_once "DB\dbfunctions.php";#

    $productId = isset($_GET['id']) ? $_GET['id'] : null;

    $product = getProductDetails($conn, $productId);

    if ($product) {
        include "product_details_template.php";
    } else {
        echo "<p>Product not found. </p>";
    }
?>



<?php
    include "includes/footer.php";
?>