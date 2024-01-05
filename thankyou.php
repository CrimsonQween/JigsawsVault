<?php 
include "includes/header.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
</head>
<body>
    <?php
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Guest';
    ?>

    <h1>Thank You, <?php echo $name; ?>!</h1>
    <p>We appreciate your contact form submission. We will get back to you soon.</p>
</body>
</html>


<?php 
include "includes/footer.php"; 
?>
