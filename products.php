<?php include "includes/header.php"; ?>

<link rel="stylesheet" type="text/css" href="style.css">

<?php
require_once "DB\db.php";
require_once "DB\dbfunctions.php";
$categories = isset($_GET['category']) ? $_GET['category'] : null;
$products = getProducts($conn, $categories);
?>

<div class="container mt-5">
    <?php if($categories): ?>
        <h1 class="mb-4"><?php echo ucfirst($categories); ?></h1>
        <!-- Product List -->
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 d-flex flex-column justify-content-between">
                        <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" class="card-img-top card-img-custom img-fluid mx-auto my-2" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text">$<?php echo htmlspecialchars($product['price']); ?></p>
                        </div>
                        <div class="card-actions text-center">
                        <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-dark">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Default content if no type/brand is selected -->
    <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>
