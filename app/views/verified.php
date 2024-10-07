<?php ((isset($email)))? "" : redirect('login'); ?>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .verification-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .display-4 {
            color: #343a40;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .lead {
            color: #6c757d;
            margin-bottom: 30px;
        }
        .btn-primary, .btn-danger {
            padding: 12px 30px;
            border-radius: 30px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="verification-container">
        <h1 class="display-4">Email Verification</h1>
        <p class="lead">Your email (<?php echo $email; ?>) has been successfully verified.</p>
        <p>Thank you for verifying your email. You can now access your account.</p>
        <a href="/upload" class="btn btn-primary mb-3">Send a file to another email</a>
        <br>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
