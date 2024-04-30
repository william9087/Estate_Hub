<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link href="registeration.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <h1 id="name">Estate Hub</h1>
    <div id="container">
        <a href="home.html" class="nav-item">Home</a>
        <a href="#about" class="nav-item">About</a>
        <a href="#services" class="nav-item">Services</a>
        <a href="#contact" class="nav-item">Contact</a>
        <a href="login_page.php" class="nav-item">Log-In</a>
        <a href="registeration.php" class="nav-item">Register</a>
    </div>
    <div class="container">
        <h2>Login Here</h2>
        <form id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <!-- Email ID -->
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Log In</button>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                                header("Location: seller.html");
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
                        // Display incorrect password message on the same page
                        echo '<p style="color: red;">Incorrect password. Please enter the correct password.</p>';
                    }
                } else {
                    echo '<p style="color: red;">No record found for the provided email</p>';
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            }
            ?>

        </form>
    </div>

    <script>
        // Form Validation
        const form = document.getElementById('signupForm');

        form.addEventListener('submit', function(event) {
            let isValid = true;

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(function(el) {
                el.textContent = '';
            });

            // Email Validation
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Invalid email format';
                isValid = false;
            }

            // Password Validation
            const password = document.getElementById('password').value;
            if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }

        });
    </script>
</body>


</html>