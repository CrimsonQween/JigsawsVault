<?php
session_start();
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status']; // Retrieve the selected status from the form
    updateOrderStatus($conn, $order_id, $new_status);
    header("Location: adminmanageorders.php");
    exit();
}

include "includes/header.php";
include "includes/footer.php";
?>