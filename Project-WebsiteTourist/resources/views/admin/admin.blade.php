<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>
    <section class="admin">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <nav class="admin__navbar">
                        <ul class="admin__nav-list">
                            <li class="admin__nav-item" data-tab="user-manage">
                                <i class="fa-solid fa-users"></i>
                                <p class="admin__text">Quản lý người dùng</p>
                            </li>
                            <li class="admin__nav-item" data-tab="tour-manage">
                                <i class="fa-solid fa-map"></i>
                                <p class="admin__text">Quản lý Tours</p>
                            </li>
                            <li class="admin__nav-item">
                                <i class="fa-solid fa-door-closed"></i>
                                <a href="{{ route('index') }}" class="admin__text">Trở về</a>
                            </li>
                            <li class="admin__nav-item">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <div class="admin__text">
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
                    <div class="admin__content">
                        @include('admin.user-manage')

                        @include('admin.tour-manage')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>

</html>
