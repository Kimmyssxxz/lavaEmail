<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Success</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .success-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }
        .display-4 {
            color: #28a745;
            font-weight: 700;
        }
        .filename-text {
            font-size: 1.1rem;
            color: #6c757d;
            margin: 20px 0;
        }
        .btn-primary, .btn-danger {
            padding: 12px 30px;
            border-radius: 30px;
            margin: 10px;
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

    <div class="success-container">
        <h1 class="display-4">Your file was successfully sent to the email!</h1>
        <p class="filename-text"><?php echo $filename; ?></p>
        <a href="/upload" class="btn btn-primary">Upload another file?</a>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <!-- Bootstrap JS and Popper.js links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppZT/1tqufKYYfmnL+w8YeMoMT4kD4MNckYTXE/nI1WqVd9OhEbZOrJYX9grs+dj" crossorigin="anonymous"></script>
</body>
</html>
