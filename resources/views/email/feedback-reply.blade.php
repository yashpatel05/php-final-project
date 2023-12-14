<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Your Feedback Reply</h2>
        <p>{{ $adminMessage }}</p>
        <p class="signature">Best regards,<br>The Shoe Company</p>
    </div>
</body>

</html>