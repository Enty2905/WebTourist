<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h1>Đặt lại mật khẩu</h1>
    <form action="{{ route('password.reset') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Email của bạn:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mật khẩu mới:</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Xác nhận mật khẩu:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Đặt lại mật khẩu</button>
    </form>
    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</body>
</html>
