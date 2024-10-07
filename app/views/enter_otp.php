<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .otp-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            color: #343a40;
            margin-bottom: 20px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 20px;
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            padding: 12px;
            font-size: 1rem;
            border-radius: 30px;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error {
            color: #dc3545;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .otp-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="otp-container text-center">
        <h1>Enter OTP</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="<?= site_url('verify-otp') ?>" method="POST">
            <input type="text" name="otp" class="form-control" placeholder="Enter your 6-digit OTP" required pattern="\d{6}" maxlength="6">
            <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
