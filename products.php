<?php
    include "includes/header.php";
?>

<h1>Our Products</h1>

<form action="filter.php" method="post">
    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="all">All</option>
        <option value="SAW">SAW</option>
        <option value="Nightare On Elm Street">Nightmare On Elm Street</option>
        <option value="The Thing">The Thing</option>
        <option value="Friday the 13th">Friday the 13th</option>
        <option value="Halloween">Halloween</option>
        <option value="Texas Chainsaw Massacre">Texas Chainsaw Massacre</option>
        <option value="Scream">Scream</option>
        <option value="The Evil Dead">The Evil Dead</option>
    </select>

    <label for="price">Price Range:</label>
    <input type="number" name="min_price" placeholder="Min Price">
    <input type="number" name="max_price" placeholder="Max Price">

    <button type="submit">Filter</button>
</form>

<div id="product-list">
    <!-- Product list will be displayed here -->
</div>

<?php
    include "includes/footer.php";
?>