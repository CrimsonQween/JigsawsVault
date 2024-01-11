<?php
session_start();
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

$orders = getOrders($conn);
?>

<div class="admin-manage-orders">
    <h2>Manage Orders</h2>

    <?php if (empty($orders)) : ?>
        <p>No orders found.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product(s)</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['customer_name']; ?></td>
                        <td><?php echo $order['product_names']; ?></td>
                        <td><?php echo $order['total_with_shipping']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td>
                        <form action="update_order_status.php" method="post">
    <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
    <label for="new_status">New Status:</label>
    <select name="new_status" id="new_status">
        <option value="Received">Received</option>
        <option value="Shipped">Shipped</option>
        <option value="Delivered">Delivered</option>
    </select>
    <button type="submit" name="update_status">Update Status</button>
</form>
                            <form action="cancel_order.php" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                <button type="submit" name="cancel_order">Cancel Order</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php
include "includes/footer.php";
?>
