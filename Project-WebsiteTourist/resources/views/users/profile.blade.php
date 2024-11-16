<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
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
                            <li class="profile__nav-item profile__nav-item--active">
                                <i class="fa-regular fa-user"></i>
                                <p class="profile__text">
                                    Hồ sơ
                                </p>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-regular fa-file-lines"></i>
                                <p class="profile__text">
                                    Tour của tôi
                                </p>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-door-closed"></i>
                                <a href="{{ route('index') }}" class="profile__text">Trở về</a>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-door-open"></i>
                                <div class="profile__text">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="">Đăng xuất</button>
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
                            <p class="profile__text">
                                Lưu thông tin để bạn đặt dịch vụ nhanh hơn
                            </p>
                        </div>
                        <figure class="profile__img-wrap">
                            <img src="{{ asset('assets/img/' . $user->avt) }}" alt="Ảnh đại diện" class="profile__avt">
                        </figure>
                    </div>
                    <table class="profile__table">
                        <thead>
                            <tr>
                                <th>Thông tin</th>
                                <th>Chi tiết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Họ tên</td>
                                <td>{{ $user->name }}</td>
                                <td><button class="profile__btn">Chỉnh sửa</button></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                                <td><button class="profile__btn">Chỉnh sửa</button></td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td>{{ $user->phone }}</td>
                                <td><button class="profile__btn">Chỉnh sửa</button></td>
                            </tr>
                            <tr>
                                <td>Tuổi</td>
                                <td>{{ $user->age }}</td>
                                <td><button class="profile__btn">Chỉnh sửa</button></td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                                <td><button class="profile__btn">Chỉnh sửa</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
