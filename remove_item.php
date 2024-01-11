<?php
require_once "DB\db.php";
require_once "DB\dbfunctions.php";

if (isset($_GET['itemId'])) {
    $itemId = $_GET['itemId'];

    // Call the function to remove the item from the database
    removeItemFromDatabase($conn, $itemId);

    // You can return a response if needed
    echo "Item removed successfully";
}
?>
