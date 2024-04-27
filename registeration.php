<!DOCTYPE html>
<html>

<head>
    <title>Registeration Page</title>
    <link href="registeration.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <h1 id="name">Estate Hub</h1>
    <div id="container">
        <a href="home.html" class="nav-item">Home</a>
        <a href="#about" class="nav-item">About</a>
        <a href="#services" class="nav-item">Services</a>
        <a href="#contact" class="nav-item">Contact</a>
        <a href="#" class="nav-item">Sign-In</a>
        <a href="registeration.php" class="nav-item">Register</a>
    </div>
    <div class="container">
        <h2>User Signup</h2>
        <form id="signupForm" action="register.php" method="post">

            <!-- First Name -->
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
                <span class="error-message" id="firstNameError"></span>
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
                <span class="error-message" id="lastNameError"></span>
            </div>

            <!-- Email ID -->
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message" id="emailError"></span>
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span class="error-message" id="usernameError"></span>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message" id="passwordError"></span>
            </div>

            <div class="form-group">
              <input type="radio" id="seller" name="user_type" value="Seller">
              <label for="seller">Seller</label><br>
              <input type="radio" id="buyer" name="user_type" value="Buyer">
              <label for="buyer">Buyer</label><br>
              <input type="radio" id="admin" name="user_type" value="Admin">
              <label for="admin">Admin</label><br>
              <span class="error-message" id="user_typeError"></span><br>  
            </div>

            <div class="form-group">
                <button type="submit">Sign Up</button>
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

            // First Name Validation
            const firstName = document.getElementById('firstName').value;
            if (!firstName.trim()) {
                document.getElementById('firstNameError').textContent = 'First name is required';
                isValid = false;
            }

            // Last Name Validation
            const lastName = document.getElementById('lastName').value;
            if (!lastName.trim()) {
                document.getElementById('lastNameError').textContent = 'Last name is required';
                isValid = false;
            }

            // Email Validation
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Invalid email format';
                isValid = false;
            }

            // Username Validation
            const username = document.getElementById('username').value;
            if (!username.trim()) {
                document.getElementById('usernameError').textContent = 'Username is required';
                isValid = false;
            }

            // Password Validation
            const password = document.getElementById('password').value;
            if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters';
                isValid = false;
            }

            const radios = document.getElementsByName('user_type');
            let count = 0;
            for (let i = 0; i < radios.length; i++){
                if (!radios[i].checked) {
                    count += 1;
                }
            }

            if (count === radios.length){
                document.getElementById('user_typeError').textContent = 'Please select user type';
                isValid = false;
            } else {
                // If at least one radio button is checked, clear the error message
                document.getElementById('user_typeError').textContent = '';
            }

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }

        });
    </script>

</body>

</html>