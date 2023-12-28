<?php
    include "includes/header.php";
?>

<div class="image-wall-container">

    <h2 class="gallery-title">Fan Gallery</h2>

<div class="image-wall">

    <a href="galleryimages/freddyhat.png" data-lightbox="gallery" data-title="Freddy Fan Pic">
        <div class="image"><img src="galleryimages/freddyhat.png" alt="Freddy Fan Pic"></div>
    </a>

    <a href="galleryimages/jigsawmask.jpg" data-lightbox="gallery" data-title="Jigsaw Fan Pic 1">
        <div class="image"><img src="galleryimages/jigsawmask.jpg" alt="Jigsaw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\reversebeartrap2.jpg" data-lightbox="gallery" data-title="Saw Fan Pic 1">
        <div class="image"><img src="galleryimages\reversebeartrap2.jpg" alt="Saw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\jigsawmask2.png" data-lightbox="gallery" data-title="Jigsaw Fan Pic 2">
        <div class="image"><img src="galleryimages\jigsawmask2.png" alt="Jigsaw Fan Pic 2"></div>
    </a>

</div>
<div class="image-wall">

    <a href="galleryimages/freddyhat.png" data-lightbox="gallery" data-title="Freddy Fan Pic">
        <div class="image"><img src="galleryimages/freddyhat.png" alt="Freddy Fan Pic"></div>
    </a>

    <a href="galleryimages/jigsawmask.jpg" data-lightbox="gallery" data-title="Jigsaw Fan Pic 1">
        <div class="image"><img src="galleryimages/jigsawmask.jpg" alt="Jigsaw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\reversebeartrap2.jpg" data-lightbox="gallery" data-title="Saw Fan Pic 1">
        <div class="image"><img src="galleryimages\reversebeartrap2.jpg" alt="Saw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\jigsawmask2.png" data-lightbox="gallery" data-title="Jigsaw Fan Pic 2">
        <div class="image"><img src="galleryimages\jigsawmask2.png" alt="Jigsaw Fan Pic 2"></div>
    </a>

</div>

</div>

<div class="image-wall">

    <a href="galleryimages/freddyhat.png" data-lightbox="gallery" data-title="Freddy Fan Pic">
        <div class="image"><img src="galleryimages/freddyhat.png" alt="Freddy Fan Pic"></div>
    </a>

    <a href="galleryimages/jigsawmask.jpg" data-lightbox="gallery" data-title="Jigsaw Fan Pic 1">
        <div class="image"><img src="galleryimages/jigsawmask.jpg" alt="Jigsaw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\reversebeartrap2.jpg" data-lightbox="gallery" data-title="Saw Fan Pic 1">
        <div class="image"><img src="galleryimages\reversebeartrap2.jpg" alt="Saw Fan Pic 1"></div>
    </a>

    <a href="galleryimages\jigsawmask2.png" data-lightbox="gallery" data-title="Jigsaw Fan Pic 2">
        <div class="image"><img src="galleryimages\jigsawmask2.png" alt="Jigsaw Fan Pic 2"></div>
    </a>

</div>

<style>
    /* Image wall styling goes here */
    .image-wall-container {
        text-align: center;
        margin: 20px;
    }

    .gallery-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .image-wall {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .image {
        width: 250px;
        height: 250px; 
        margin: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .image:hover {
        transform: scale(1.05);
    }

    .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<!-- The lightbox library -->
<script src="lightbox\lightbox-plus-jquery.js"></script>
<link rel="stylesheet" href="lightbox\lightbox.css">

<?php
    include "includes/footer.php";
?>