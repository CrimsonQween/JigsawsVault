<?php
session_start();
include "includes/header.php";
require_once "DB\db.php";
require_once "DB\dbfunctions.php"; 
$users = getUsersFromDatabase();

?>

<div class="admin-manage-users">
    <h2>Manage Users</h2>

    <?php
    if (!empty($users)) {
        echo '<table>';
        echo '<tr><th>Username</th><th>Email</th><th>Action</th></tr>';

        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . ($user['is_admin'] ? 'Admin' : 'User') . '</td>';
            echo '<td><a href="edituser.php?id=' . $user['id'] . '">Edit</a> | <a href="deleteuser.php?id=' . $user['id'] . '">Delete</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No users found.</p>';
    }
    ?>
</div>

<?php
include "includes/footer.php";
?>
