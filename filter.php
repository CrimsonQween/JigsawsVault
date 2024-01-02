<?php
// Connect to the database (update with your database credentials)
$host = "localhost";
$username = "root";
$database = "killersvault";

$conn = new mysqli($host, $username, '', $database);

if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query based on the filters
$category = $_POST['category'];
$minPrice = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
$maxPrice = isset($_POST['max_price']) ? $_POST['max_price'] : PHP_INT_MAX;

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM products WHERE (category = ? OR ? = 'all') AND price BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdd", $category, $category, $minPrice, $maxPrice);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Category: " . $row["category"] . " - Price: $" . $row["price"] . "<br>";
    }
} else {
    echo "No results found";
}

$stmt->close();
$conn->close();
?>
