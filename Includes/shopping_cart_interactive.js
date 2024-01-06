// shopping_cart_interactivity.js
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-btn')) {
        var productId = event.target.getAttribute('data-productid');
        // Implement logic to remove the product with the specified ID
        // You can use AJAX to communicate with the server and update the cart dynamically
        console.log("Remove button clicked for product ID: " + productId);
    }
});
