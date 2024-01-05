<?php
    // Include header
    include "includes/header.php";

    // Define variables to store user input
    $name = $email = $message = "";

    // Define variables to store error messages
    $nameErr = $emailErr = $messageErr = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if the email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate message
        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = test_input($_POST["message"]);
        }
    }

    // Function to sanitize user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>

<link rel="stylesheet" type="text/css" href="style.css">


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

<!-- HTML form for the contact page -->
<div class="container" id="contact-container">
    <h2 id="contact-heading">Contact Us</h2>
    <form method="post" action="submitcontact.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <span class="error"><?php echo $nameErr; ?></span>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4"></textarea>
        <span class="error"><?php echo $messageErr; ?></span>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php
    // Include footer
    include "includes/footer.php";
?>
