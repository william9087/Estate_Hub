<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link href="registeration.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <h2>Login Here</h2>
            <form id="signupForm" action="register.php" method="post">

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
                  <span class="error-message" id="user_typeError"></span>
                  <input type="radio" id="seller" name="user_type" value="Seller">
                  <label for="seller">Seller</label><br>
                  <input type="radio" id="buyer" name="user_type" value="Buyer">
                  <label for="buyer">Buyer</label><br>
                  <input type="radio" id="admin" name="user_type" value="Admin">
                  <label for="admin">Admin</label>
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

                const radios = document.getElementsByName('user_type');
                let count = 0;
                for (let i = 0; i < radios.length; i++){
                    if (!radios[i].checked) {
                        count += 1;
                    }
                }

                if (count === radios.length){
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }

            });
        </script>        
    </body>


</html>