<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h5 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #343a40;
            text-align: center;
        }

        .form-container label {
            font-weight: 500;
            color: #495057;
        }

        .form-container .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.2s ease;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-container .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
        }

        .form-container .input-group-text i {
            color: #495057;
        }

        .form-container .form-text {
            font-size: 0.9rem;
        }

        .form-container .password-error {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .back-btn {
            text-align: center;
            margin-top: 15px;
        }

        .back-btn a {
            color: #28a745;
        }

        .back-btn a:hover {
            color: #218838;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h5><i class="fa-solid fa-user-plus"></i> Create Your Account</h5>
        <form action="<?= site_url('createaccount'); ?>" method="post" onsubmit="return validatePassword();">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelpBlock" required>
                <div id="emailHelpBlock" class="form-text">
                    A confirmation link will be sent to your email for account activation.
                </div>
            </div>

            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" id="inputPassword5" name="password" class="form-control" aria-describedby="passwordHelpBlock" minlength="8" required>
                    <button type="button" id="togglePassword" class="input-group-text">
                        <i class="fas fa-eye" id="passwordToggleIcon"></i>
                    </button>
                </div>
                <div id="passwordErrorMessage" class="password-error"></div>
                <div id="passwordHelpBlock" class="form-text">
                    Password must be 8-20 characters long, contain letters, numbers, and special characters.
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Create Account</button>
            </div>

            <div class="back-btn">
                <a href="/login">Back to Login</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", togglePasswordVisibility);

        function validatePassword() {
            const passwordInput = document.getElementById("inputPassword5");
            const password = passwordInput.value;

            // Regular expressions for password requirements
            const specialCharacterRegex = /[!@#\$%\^&\*()_\-+\{\}\|\[\]:;"'<>,\./]/;
            const numberRegex = /[0-9]/;
            const uppercaseLetterRegex = /[A-Z]/;
            const lowercaseLetterRegex = /[a-z]/;

            if (
                specialCharacterRegex.test(password) &&
                numberRegex.test(password) &&
                uppercaseLetterRegex.test(password) &&
                lowercaseLetterRegex.test(password) &&
                password.length >= 8
            ) {
                document.getElementById("passwordErrorMessage").textContent = "";
                return true; // Allow form submission
            } else {
                document.getElementById("passwordErrorMessage").textContent =
                    "Password must contain at least 1 special character, 1 number, 1 uppercase and lowercase letter, and be at least 8 characters long.";
                return false; // Prevent form submission
            }
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("inputPassword5");
            const passwordToggleIcon = document.getElementById("passwordToggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggleIcon.classList.remove("fa-eye");
                passwordToggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordToggleIcon.classList.remove("fa-eye-slash");
                passwordToggleIcon.classList.add("fa-eye");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
