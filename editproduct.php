<?php
session_start();
include "includes/header.php";

// Check if the user is logged in and has a role
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

// Fetch and display the list of products (you should replace this with your actual product retrieval logic)
$products = array(
    array('id' => 1, 'name' => 'Product 1', 'price' => 20.99),
    array('id' => 2, 'name' => 'Product 2', 'price' => 30.99),
    // Add more products as needed
);

?>

<div class="admin-dashboard">
    <h2>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h2>
    <ul>
        <li><a href="admineditproductpage.php">Manage Products</a></li>
    </ul>

    <h3>Product List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                        <a href="editproduct.php?id=<?php echo $product['id']; ?>">Edit</a>
                        <!-- Add more actions as needed (e.g., delete) -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add a link to the page where you can add new products -->
    <p><a href="addproduct.php">Add New Product</a></p>
</div>

<?php
include "includes/footer.php";
?>
