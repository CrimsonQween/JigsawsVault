<?php
session_start();

include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'add_to_cart' && isset($_POST['product_id'])) {
        $productIdToAdd = $_POST['product_id'];
        $productDetails = getProductDetails($conn, $productIdToAdd);

        addToCart($productDetails['id'], $productDetails['name'], $productDetails['price'], $_POST['quantity']);
    } elseif ($_POST['action'] === 'remove' && isset($_POST['product_id'])) {
        $productIdToRemove = $_POST['product_id'];
        removeFromCart($productIdToRemove);
    }
}

$cartContents = getCartContents();
?>

<section class="container mt-4">
    <h2>Your Shopping Cart</h2>

    <div class="row">
        <div class="col-md-8">
            <?php if ($cartContents): ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartContents as $item): ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td><?php echo $item['price'] * $item['quantity']; ?></td>
                                    <td>
                                        <button type="submit" class="btn btn-danger" name="action" value="remove">
                                            Remove
                                        </button>
                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            <?php else: ?>
                <p>Your shopping cart is empty</p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <?php if ($cartContents): ?>
                        <?php
                        $subtotal = 0;
                        foreach ($cartContents as $item) {
                            $subtotal += $item['price'] * $item['quantity'];
                        }
                        $shippingCostPercentage = 0.10; // 10% of the subtotal as shipping cost
                        $shippingCost = $subtotal * $shippingCostPercentage;
                        $tax = $subtotal * 0.16; // Assuming 16% tax, adjust as needed
                        $total = $subtotal + $tax + $shippingCost;
                        ?>
                        <p class="card-text">Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                        <p class="card-text">Tax: $<?php echo number_format($tax, 2); ?></p>
                        <p class="card-text">Shipping Cost: $<?php echo number_format($shippingCost, 2); ?></p>
                        <p class="card-text">Total: $<?php echo number_format($total, 2); ?></p>
                        <a href="checkout.php?subtotal=<?php echo $subtotal; ?>&tax=<?php echo $tax; ?>&shipping_cost=<?php echo $shippingCost; ?>&total=<?php echo $total; ?>" class="btn btn-primary">Proceed to Checkout</a>
                    <?php else: ?>
                        <p class="card-text">Subtotal: $0.00</p>
                        <p class="card-text">Tax: $0.00</p>
                        <p class="card-text">Shipping Cost: $0.00</p>
                        <p class="card-text">Total: $0.00</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "includes/footer.php";
?>
