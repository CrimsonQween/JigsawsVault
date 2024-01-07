<?php
session_start();

include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

// Retrieve order summary from the session
$orderSummary = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// Retrieve calculated values from query parameters
$subtotal = isset($_GET['subtotal']) ? $_GET['subtotal'] : 0;
$tax = isset($_GET['tax']) ? $_GET['tax'] : 0;
$shippingCost = isset($_GET['shipping_cost']) ? $_GET['shipping_cost'] : 0;
$total = isset($_GET['total']) ? $_GET['total'] : 0;
?>

<section class="container mt-4">
    <h2>Checkout</h2>

    <div class="row">
        <div class="col-md-8">
            <!-- Display order summary from the session -->
            <h3>Order Summary</h3>
            <?php if (!empty($orderSummary)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderSummary as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['price']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['total']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Your order summary is empty</p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <form action="process_order.php" method="post">
                <!-- Add form fields for billing information -->
                <h3>Billing Information</h3>
                <div class="form-group">
                    <label for="billing_name">Full Name:</label>
                    <input type="text" name="billing_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="billing_address">Address:</label>
                    <textarea name="billing_address" rows="4" class="form-control" required></textarea>
                </div>

                <!-- Add more form fields for billing information (e.g., city, state, zip code, etc.) -->

                <hr>

                <!-- Add form fields for payment information -->
                <h3>Payment Information</h3>
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="text" name="card_number" class="form-control" required>
                </div>

                <!-- Add more form fields for payment information (e.g., expiration date, CVV, etc.) -->

                <!-- Display calculated values from the shopping cart page -->
                <h3>Order Summary</h3>
                <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                <p>Tax: $<?php echo number_format($tax, 2); ?></p>
                <p>Shipping Cost: $<?php echo number_format($shippingCost, 2); ?></p>
                <p>Total: $<?php echo number_format($total, 2); ?></p>

                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
</section>

<?php
include "includes/footer.php";
?>
