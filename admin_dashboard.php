<?php 
session_start(); 
include "includes/header.php"; 
?>

<link rel="stylesheet" type="text/css" href="style.css">


<div class="admin-dashboard">
    <h2>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h2>
    <ul>
        <li><a href="admineditproductpage.php">Manage Products</a></li>
        <li><a href="adminmanageusers.php">Manage Users</a></li>
        <li><a href="adminmanageorders.php">Manage Orders</a></li> <!-- New link for Manage Orders -->
    </ul>
</div>

<?php 
include "includes/footer.php"; 
?>
