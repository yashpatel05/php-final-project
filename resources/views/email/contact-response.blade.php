<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .problem-details {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }

        .admin-message {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="problem-details">
            <p><strong>Problem Details:</strong></p>
            <p>{{ $problemDetails }}</p>
        </div>

        <div class="admin-message">
            <p><strong>Admin Message:</strong></p>
            <p>{{ $adminMessage }}</p>
        </div>
    </div>
</body>

</html>