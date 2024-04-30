<?php
// Establish database connection
$host = "localhost";
$user = "wwang39";
$pass = "wwang39";
$dbname = "wwang39";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle property submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];
    $floors = $_POST['floors'];
    $location = $_POST['location'];

    // Insert property data into property table
    $sql = "INSERT INTO property (price, rooms, floors, location) VALUES ('$price', '$rooms', '$floors', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "Property added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$stmt->close();
$conn->close();

header('Location: seller.html');
