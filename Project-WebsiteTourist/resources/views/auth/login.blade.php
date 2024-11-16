<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="video-background">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/videos/bg.mp4') }}" type="video/mp4">
        </video>
    </div>
    <section id="login" class="section-login">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <h1>Con Đường Di Sản Miền Trung</h1>
        </div>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <h2>Đăng Nhập</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email" placeholder=" " required>
                        <label for="email">Email/Số điện thoại</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" placeholder=" " required>
                        <label for="password">Mật khẩu</label>
                    </div>
                    <div class="forget">
                        <label>
                            <input type="checkbox" name="remember"> Lưu mật khẩu cho lần đăng nhập tới
                        </label>
                        <a href="#">Quên mật khẩu</a>
                    </div>
                    <button type="submit">Đăng nhập</button>
                    <div class="link">
                        <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="website-description">
        <span>Đến với chúng tôi bạn có thể trải nghiệm những danh lăng thắm cảnh và hàng loạt địa điểm vui chơi, giải
            trí</span>
    </div>
    <div class="travel-icons">
        <ion-icon name="airplane-outline"></ion-icon>
        <ion-icon name="location-outline"></ion-icon>
        <ion-icon name="bag-outline"></ion-icon>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
