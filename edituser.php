<?php
session_start();
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php"; 

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login page if not logged in or not an admin
    exit();
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details based on the user ID
    $userDetails = getUserDetails($conn, $userId);  // Pass $conn as the first argument

    if (!$userDetails) {
        echo '<p>User not found.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
    exit();
}

?>

<div class="admin-edit-user">
    <h2>Edit User</h2>

    <?php
    if ($userDetails) {
        // Display the user details in a form for editing
        echo '<form action="updateuser.php" method="post">';
        echo '<input type="hidden" name="user_id" value="' . $userDetails['id'] . '">';
        
        echo '<label for="username">Username:</label>';
        echo '<input type="text" id="username" name="username" value="' . $userDetails['username'] . '" disabled><br>';
        
        echo '<label for="email">Email:</label>';
        echo '<input type="email" id="email" name="email" value="' . $userDetails['email'] . '" required><br>';
        
        echo '<label for="password">New Password:</label>';
        echo '<input type="password" id="password" name="password" required><br>';
        
        echo '<label for="role">Role:</label>';
        echo '<select id="role" name="role">';
        echo '<option value="0" ' . ($userDetails['is_admin'] == 0 ? 'selected' : '') . '>User</option>';
        echo '<option value="1" ' . ($userDetails['is_admin'] == 1 ? 'selected' : '') . '>Admin</option>';
        echo '</select><br>';
        
        echo '<input type="submit" value="Update User">';
        echo '</form>';
    }
    ?>

</div>

<?php
include "includes/footer.php";
?>
