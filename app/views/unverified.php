<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .verification-container {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .verification-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 20px;
        }

        .verification-container p {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .verification-container .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: 30px;
            transition: background-color 0.2s ease;
        }

        .verification-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .verification-container a {
            color: #28a745;
        }

        .verification-container a:hover {
            color: #218838;
            text-decoration: none;
        }

        .enter-otp-btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="verification-container text-center">
            <h1 class="display-4">Email Not Verified</h1>
            <p class="lead">Please check your inbox and click the verification link to activate your account.</p>
            <p>Alternatively, you can go back to the <a href="/login">Login</a> page.</p>
            <form action="/index.php/enter-otp" method="get" class="enter-otp-btn">
                <button type="submit" class="btn btn-primary btn-lg">Enter OTP</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
