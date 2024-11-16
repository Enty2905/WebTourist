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
                            <li class="profile__nav-item profile__nav-item--active" id="profile-info-tab">
                                <i class="fa-regular fa-user"></i>
                                <p class="profile__text">Hồ sơ</p>
                            </li>
                            <li class="profile__nav-item" id="my-tours-tab">
                                <i class="fa-regular fa-file-lines"></i>
                                <p class="profile__text">Tour của tôi</p>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-door-closed"></i>
                                <a href="{{ route('index') }}" class="profile__text">Trở về</a>
                            </li>
                            <li class="profile__nav-item">
                                <i class="fa-solid fa-door-open"></i>
                                <div class="profile__text">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="">Đăng xuất</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-9">
                    <div id="profile-info">
                        <!-- Thông tin cá nhân -->
                        <div class="profile__header">
                            <div class="profile__header-left">
                                <h1 class="profile__title">Thông tin cá nhân</h1>
                                <p class="profile__text">Lưu thông tin để bạn đặt dịch vụ nhanh hơn</p>
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

                    <div id="my-tours" style="display: none;">
                        <table class="profile__table profile__tour">
                            <thead>
                                <tr>
                                    <th>Tên tour</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Số người</th>
                                    <th>Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody id="booking-list">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('my-tours-tab').addEventListener('click', function () {
            document.getElementById('profile-info').style.display = 'none';
            document.getElementById('my-tours').style.display = 'block';

            fetch('{{ route('profile.bookings') }}')
                .then(response => response.json())
                .then(data => {
                    let tableRows = '';

                    data.forEach(booking => {
                        tableRows += `
                            <tr>
                                <td>${booking.tour_name}</td>
                                <td>${booking.booking_date}</td>
                                <td>${booking.start_date}</td>
                                <td>${booking.num_people}</td>
                                <td>${parseFloat(booking.total_price).toLocaleString()} VND</td>
                            </tr>`;
                    });

                    document.getElementById('booking-list').innerHTML = tableRows;
                });
        });

        document.getElementById('profile-info-tab').addEventListener('click', function () {
            document.getElementById('profile-info').style.display = 'block';
            document.getElementById('my-tours').style.display = 'none';
        });
    </script>
</body>

</html>
