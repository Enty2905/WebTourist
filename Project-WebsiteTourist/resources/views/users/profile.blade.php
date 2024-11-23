<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>

<body>
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <nav class="profile__navbar">
                        <ul class="profile__nav-list">
                            <li class="profile__nav-item profile__nav-item--active" id="profile-info-tab">
                                <i class="fa-regular fa-user"></i>
                                <p class="profile__text">Hồ sơ</p>
                            </li>
                            <li class="profile__nav-item" id="my-tours-tab">
                                <i class="fa-regular fa-file-lines"></i>
                                <p class="profile__text">Tour của tôi</p>
                            </li>
                            @if (auth()->user()->role === 'admin')
                                <li class="profile__nav-item">
                                    <i class="fa-solid fa-cog"></i>
                                    <a href="{{ route('admin.dashboard') }}" class="profile__text">Quản trị</a>
                                </li>
                            @endif
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-door-closed"></i>
                                <a href="{{ route('index') }}" class="profile__text">Trở về</a>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <div class="profile__text">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">Đăng xuất</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-9">
                    <div class="profile__header">
                        <div class="profile__header-left">
                            <h1 class="profile__title">Thông tin cá nhân</h1>
                            <p class="profile__text">Lưu thông tin để bạn đặt dịch vụ nhanh hơn</p>
                        </div>
                        <figure class="profile__img-wrap">
                            <img src="{{ asset('assets/img/avt/' . $user->avt) }}" alt="Ảnh đại diện"
                                class="profile__avt" id="profileAvt">
                            <input type="file" id="uploadAvtInput" accept="image/*" style="display: none;">
                        </figure>
                    </div>
                    @include('users.profile-info')
                    @include('users.profile-tours')
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/profile.js') }}"></script>
</body>

</html>
