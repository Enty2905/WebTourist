<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Page</title>
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/videos/bg.mp4') }}" type="video/mp4">
        </video>
    </div>
    <section id="register" class="section-register">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <h1>Con Đường Di Sản Miền Trung</h1>
        </div>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Hiển thị lỗi xác thực -->
                    @if ($errors->any())
                        <div class="error-messages">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2>Đăng ký</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" id="name" name="name" placeholder=" " required>
                        <label for="name">Tên của bạn</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email" placeholder=" " required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="phone-outline"></ion-icon>
                        <input type="phone" id="phone" name="phone" placeholder=" " required>
                        <label for="phone">Số điện thoại</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" placeholder=" " required>
                        <label for="password">Mật khẩu</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder=" " required>
                        <label for="password_confirmation">Nhập lại mật khẩu</label>
                    </div>
                    <button type="submit">Đăng ký</button>
                    <div class="link">
                        <p>Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="website-description">
        <span>Đến với chúng tôi bạn có thể trải nghiệm những danh lăng thắm cảnh và hàng loạt địa điểm vui chơi, giải trí</span>
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