<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Xin chào,</h1>
    <p>Bạn đã yêu cầu đặt lại mật khẩu. Nhấp vào liên kết dưới đây để đặt lại mật khẩu của bạn:</p>
    <a href="{{ url('/password/reset/' . $token) }}">Đặt lại mật khẩu</a>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
</body>

</html>
