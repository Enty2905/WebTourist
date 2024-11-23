<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    <h1>Quên mật khẩu</h1>
    <form action="{{ route('password.forgot') }}" method="POST">
        @csrf
        <label for="email">Nhập email của bạn:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Gửi yêu cầu</button>
    </form>
    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif
    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
    <a href="{{ route('login') }}">Quay lại đăng nhập</a>
</body>
</html>
