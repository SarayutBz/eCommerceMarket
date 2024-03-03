<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ยืนยันรหัสผ่านใหม่</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
            color: #333;
        }

        h3 {
            color: #007bff; /* Blue color */
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .confirmation-code {
            font-weight: bold;
            color: #28a745; /* Green color */
        }

        .contact-info {
            font-style: italic;
            color: #888;
        }

        .thank-you {
            font-weight: bold;
            color: #007bff; /* Blue color */
        }

        .team-name {
            font-weight: bold;
            color: #dc3545; /* Red color */
        }
    </style>
</head>
<body>
    <h3>ยืนยันรหัสผ่านใหม่สำหรับบัญชีของคุณ</h3>
    <p>{{$data['body1']}}</p>
    <p>{{$data['body2']}}</p>
    <p class="confirmation-code">{{$data['body3']}}</p>
    <p>{{$data['body4']}}</p>
    <p>{{$data['body5']}}</p>
    <p>{{$data['body6']}}</p>
    <p class="thank-you">{{$data['body7']}}</p>
    <p class="team-name">{{$data['body8']}}</p>
</body>
</html>
