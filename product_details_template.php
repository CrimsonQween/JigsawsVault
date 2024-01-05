<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($product['imagePath']); ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($product['name']); ?>" style="height: 300px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h1 class="display-4"><?= htmlspecialchars($product['name']); ?></h1>
            <p class="lead">Price: $<?= number_format(htmlspecialchars($product['price']), 2); ?></p>
            <p class="text-justify"><?= htmlspecialchars($product['description']); ?></p>
            <!-- Add other product details as needed -->
            <div class="card-actions text-center mt-3">
                <button class="btn btn-dark btn-lg">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
