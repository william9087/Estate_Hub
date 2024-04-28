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
        <a href="home.html#about" class="nav-item">About</a>
        <a href="home.html#services" class="nav-item">Services</a>
        <a href="home.html#contact" class="nav-item">Contact</a>
        <a href="login_page.php" class="nav-item">Log-In</a>
        <a href="registeration.php" class="nav-item">Register</a>
    </div>
    <div class="container">
        <h2>Login Here</h2>
        <form id="signupForm" action="login.php" method="post">

            <!-- Email ID -->
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message" id="emailError"></span>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message" id="passwordError"></span>
            </div>

            <div class="form-group">
                <button type="submit">Log In</button>
            </div>
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