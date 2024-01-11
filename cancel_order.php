<?php
session_start();
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];
    // Cancel the order in the database (you need to implement this function in dbfunctions.php)
    cancelOrder($conn, $order_id);
    header("Location:adminmanageorders.php"); // Redirect back to the order management page
    exit();
}
?>
