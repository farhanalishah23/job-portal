<!DOCTYPE html>
<html>
<head>
    <title>Job Status Updated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            border: 1px solid #dddddd;
            border-radius: 10px;
            max-width: 600px;
        }
        h1 {
            color: #28a745;
        }
        p {
            font-size: 16px;
            color: #333333;
        }
        .status {
            font-weight: bold;
            color: {{ $status === 'active' ? '#28a745' : '#dc3545' }};
        }
        .logo {
            width: 150px; /* Adjust size as needed */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Embed logo -->
        <img src="http://127.0.0.1:8000/assets/img/logo.png" alt="JobBoard Logo" class="logo">
        <h1>Job Alert!</h1>
        <p>Hello, <strong>{{ $username }}</strong></p>
        <p>Your job has been <span class="status">{{ ucfirst($status) }}</span>.</p>
        <p>Thank you for using our platform!</p>
    </div>
</body>
</html>
