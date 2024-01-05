<?php
    include "includes/header.php";
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
        height: auto; 
        overflow: hidden; 
    }

    .carousel-inner {
        height: 100%; 
    }

    .carousel-inner img {
        max-width: 100%;
        max-height: 800px;
        height: 100%; 
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
        <!-- Featured Product 1 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="products\TheThing.jpg" class="card-img-top mx-auto" alt="TheThingInAJar">
                <div class="card-body text-center">
                    <h5 class="card-title">The Thing in a Jar</h5>
                    <a href="#" class="btn btn-dark">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Featured Product 2 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="products\Necronomicon.jpg" class="card-img-top mx-auto" alt="Necronomicon">
                <div class="card-body text-center">
                    <h5 class="card-title">Necronomicon</h5>
                    <a href="#" class="btn btn-dark">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Featured Product 3 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="products\ReverseBearTrap.png" class="card-img-top mx-auto" alt="ReverseBearTrap">
                <div class="card-body text-center">
                    <h5 class="card-title">Reverse Bear Trap</h5>
                    <a href="#" class="btn btn-dark">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "includes/footer.php";
?>