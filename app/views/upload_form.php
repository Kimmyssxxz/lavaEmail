<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
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
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .form-control {
            margin-bottom: 20px;
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

    <div class="form-container text-center">
        <!-- Display errors if any -->
        <?php if(isset($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <?= $error ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h1 class="display-6">Send to Email</h1>
        <p class="lead">Try sending a file to your email.</p>
        
        <form action="<?php echo site_url('/do_upload');?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" placeholder="Enter the Email's Title or your name..." required />
            <input type="email" name="email" class="form-control" placeholder="Enter recipient's Email..." required />
            <input type="text" name="subject" class="form-control" placeholder="Enter email's Subject..." required />
            <textarea name="content" class="form-control" placeholder="Enter email's Content..." rows="4" required></textarea>
            <input type="file" name="userfile" class="form-control" accept="image/png, image/gif, image/jpeg" />
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form><br>

        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <!-- Bootstrap JS and Popper.js links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppZT/1tqufKYYfmnL+w8YeMoMT4kD4MNckYTXE/nI1WqVd9OhEbZOrJYX9grs+dj" crossorigin="anonymous"></script>
</body>
</html>
