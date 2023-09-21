<!DOCTYPE html>
<html>
<head>
    <title>Event Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            font-size: 18px;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        Event Notification
    </div>
    <div class="content">
        <p>Hello,</p>
        <p>You have a new event:</p>
        <p class="highlight">{{ $msg }}</p>
        <p>Best regards,</p>
        <p>Your Team</p>
    </div>
</div>
</body>
</html>
