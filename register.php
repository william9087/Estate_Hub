<?php
$host = "localhost";
$user = "wwang39";
$pass = "wwang39";
$dbname = "wwang39";
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    echo "Could not connect to server\n";
    die("Connect failed: " . $conn->connect_error);
} else {
    echo "Connect established\n";
}

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];

// SQL query to insert data into the database
$sql = "INSERT INTO user_info (first_name, last_name, email, user_name, password, user_type) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
echo "1\n";

// Bind parameters and execute the statement
$stmt->bind_param("ssssss", $firstName, $lastName, $email, $username, $password, $user_type);

echo "1232";

try {
    if ($stmt->execute()) {
        echo "1232";
        echo "User registered successfully\n";
    } else {
        echo "12311112";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (Exception $e) {
    echo "444";
    echo $e->getMessage();
}

echo "1321232";

// Close the statement and connection
$stmt->close();
$conn->close();

header('Location: home.html');
