<?php
    include "includes/header.php";
    include "DB\db.php";
    include "DB\dbfunctions.php";
    $products = Get3Prod();
?>

<link rel="stylesheet" type="text/css" href="style.css">

<style>
    body {
        background-color: black;
        margin: 0; /* Remove default margin to ensure full coverage */
        padding: 0; /* Remove default padding to ensure full coverage */
    }

    #myCarousel {
    max-width: 1500px;
    margin: auto;
    height: 900px; 
    overflow: hidden;
}

.carousel-inner {
    height: 100%;
}

.carousel-inner img {
    max-width: 100%;
    max-height: 100%; 
    height: auto;
    width: auto;
    margin: 0 auto;
}
</style>

<body>
<!-- Bootstrap Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="movieposters\ANOES.png" class="d-block w-100" alt="First Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\evildead.jpg" class="d-block w-100" alt="Second Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\Friday13.png" class="d-block w-100" alt="Third Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\halloween.jpg" class="d-block w-100" alt="Third Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\saw.png" class="d-block w-100" alt="Third Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\scream-franchise.jpeg" class="d-block w-100" alt="Third Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\texas.jpg" class="d-block w-100" alt="Third Slide">
        </div>
        <div class="carousel-item">
            <img src="movieposters\thing.jpg" class="d-block w-100" alt="Third Slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Featured Products Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Featured Products</h2>
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
</div>

<?php
    include "includes/footer.php";
?>