<?php
session_start();

require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve billing and shipping information from the form
    $billingName = $_POST['billing_name'];
    $billingAddress = $_POST['billing_address'];
    $cardNumber = $_POST['card_number'];

    // Process the order and store details in the database
    $orderSummary = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $conn = connectToDatabase();

    // Insert order information into the 'orders' table
    $orderDate = date('Y-m-d H:i:s');
    $shippingCost = 5.00; // Update with the actual shipping cost
    $totalWithShipping = $_SESSION['total'] + $shippingCost;

    $sql = "INSERT INTO orders (customer_name, billing_address, card_number, order_date, shipping_cost, total_with_shipping) 
            VALUES ('$billingName', '$billingAddress', '$cardNumber', '$orderDate', '$shippingCost', '$totalWithShipping')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the last inserted order ID
        $orderId = $conn->insert_id;

        // Insert order items into the 'order_items' table
        foreach ($orderSummary as $item) {
            $productId = $item['id'];
            $quantity = $item['quantity'];
            $total = $item['total'];

            $sql = "INSERT INTO order_items (order_id, product_id, quantity, total_price) 
                    VALUES ('$orderId', '$productId', '$quantity', '$total')";

            $conn->query($sql);
        }

        // Clear the shopping cart
        unset($_SESSION['cart']);

        // Redirect to a thank you page or order confirmation page
        header("Location: thank_you_order.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the home page if accessed directly
    header("Location: home.php");
    exit();
}
?>
