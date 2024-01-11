<?php
session_start();

include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

// Get the selected country from the query parameters
$selectedCountry = isset($_GET['billing_country']) ? $_GET['billing_country'] : null;

// Fetch cities based on the selected country
$cities = ($selectedCountry) ? getCitiesByCountry($selectedCountry) : array();

// Get the selected city from the form
$selectedCity = isset($_GET['billing_city']) ? $_GET['billing_city'] : null;

// Fetch streets based on the selected city
$streets = ($selectedCity) ? getStreetsByCity($selectedCity) : array();

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
            <form action="process_order.php" method="post" id="checkoutForm">
                <div class="form-group">
                    <label for="billing_country">Country:</label>
                    <select name="billing_country" id="billing_country" class="form-control" required>
                        <?php
                        $countries = getCountries();
                        foreach ($countries as $country) {
                            $selected = ($selectedCountry == $country['country_id']) ? 'selected' : '';
                            echo "<option value='{$country['country_id']}' $selected>{$country['country_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="billing_city">City:</label>
                    <select name="billing_city" id="billing_city" class="form-control" required>
                        <?php
                        foreach ($cities as $city) {
                            $selected = ($selectedCity == $city['city_id']) ? 'selected' : '';
                            echo "<option value='{$city['city_id']}' $selected>{$city['city_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="billing_street">Street:</label>
                    <select name="billing_street" id="billing_street" class="form-control" required>
                        <?php
                        foreach ($streets as $street) {
                            echo "<option value='{$street['street_id']}'>{$street['street_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="house_number">House Number:</label>
                    <input type="text" name="house_number" class="form-control" required>
                </div>

                <hr>

                <!-- Add form fields for payment information -->
                <h3>Payment Information</h3>

                <!-- Add form fields for payment information -->
                <h3>Payment Information</h3>

                <div class="form-group">
    <label for="cardholder_name">Cardholder Name:</label>
    <input type="text" name="cardholder_name" class="form-control" required>
</div>

                <div class="form-group">
    <label for="card_number">Card Number:</label>
    <input type="text" name="card_number" class="form-control" required>
</div>

<div class="form-group">
    <label for="expiration_date">Expiration Date:</label>
    <input type="text" name="expiration_date" class="form-control" placeholder="MM/YYYY" required>
</div>

<div class="form-group">
    <label for="cvv">CVV:</label>
    <input type="text" name="cvv" class="form-control" required>
</div>

            <form action="process_order.php" method="post">
                <!-- Payment Information fields -->
                
                <h3> Order Summary</h3>
                <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                <p>Tax: $<?php echo number_format($tax, 2); ?></p>
                <p>Shipping Cost: $<?php echo number_format($shippingCost, 2); ?></p>
                <p>Total: $<?php echo number_format($total, 2); ?></p>

                <button type="submit" class="btn btn-primary" name="place_order">Place Order</button>
            </form>
        </div>
    </div>
</section>

<?php
include "includes/footer.php";
?>