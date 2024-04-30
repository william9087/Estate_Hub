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
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to retrieve hashed password and user type based on email
$sql = "SELECT password, user_type FROM user_info WHERE email = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameter and execute the statement
$stmt->bind_param("s", $email);
$stmt->execute();

// Bind the result variables
$stmt->bind_result($hashed_password, $user_type);

// Fetch the result
if ($stmt->fetch()) {
    // Verify if the provided password matches the hashed password stored in the database
    if (password_verify($password, $hashed_password)) {
        echo "Login successful\n";

        // Redirect user based on user_type
        switch ($user_type) {
            case 'Seller':
                header("Location: seller_dashboard.php");
                break;
            case 'Buyer':
                header("Location: buyer_dashboard.php");
                break;
            case 'Admin':
                header("Location: admin_dashboard.php");
                break;
            default:
                // Redirect to a default page if user_type is not recognized
                header("Location: default_dashboard.php");
                break;
        }
        exit; // Make sure to exit after redirecting
    } else {
        echo "Incorrect password\n";
    }
} else {
    echo "No record found for the provided email\n";
}

// Close the statement and connection
$stmt->close();
$conn->close();
