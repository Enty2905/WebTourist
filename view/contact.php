<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <!-- Header top -->
        <div class="header__top">
            <div class="container__fluid">
                <div class="header__top-inner">
                    <a href="" class="logo">
                        <img src="../assets/img/logo.png" alt="" class="logo__img">
                    </a>
                    <nav class="navbar">
                        <ul class="navbar__list">
                            <li class="navbar__item">
                                <a href="../" class="navbar__link">Home</a>
                            </li>
                            <li class="navbar__item">
                                <a href="about.php" class="navbar__link">About Us</a>
                            </li>
                            <li class="navbar__item">
                                <a href="destinations.php" class="navbar__link">Destinations </a>
                            </li>
                            <li class="navbar__item">
                                <a href="tour.php" class="navbar__link">Tour </a>
                            </li>
                            <li class="navbar__item">
                                <a href="blog.php" class="navbar__link">Blog </a>
                            </li>
                            <li class="navbar__item">
                                <a href="contact.php" class="navbar__link navbar__link--active">Contact Us </a>
                            </li>
                        </ul>
                    </nav>
                    <a href="account.php" class="header__account">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Main -->
    <main class="main">
        <!-- Contact Banner -->
        <section class="banner">
            <div class="container">
                <div class="banner__inner">
                    <p class="section-desc-heading banner__desc">
                        We'd love to hear from you!
                    </p>
                    <h2 class="section-title banner__title">
                        Contact Us
                    </h2>
                </div>
            </div>
        </section>
        <!-- Contact Form -->
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-sm-12">
                        <div class="inner-contact">
                            <div class="contact__info">
                                <div class="contact__top">
                                    <p class="contact__desc section-desc-heading">
                                        Would like to talk?
                                    </p>
                                    <h3 class="contact__title section-title">
                                        Contact Details
                                    </h3>
                                </div>
                                <p class="contact__desc-main">
                                    If you have a story to share or a question that has not been answered on our website, please get in touch with us via contact details listed below or fill in the form on the right.
                                </p>
                                <ul class="contact__list">
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                </ul>
                                <div class="contact__social">
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></i></a>
                                    <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-12">
                        <div class="contact-form">
                            <div class="contact__top">
                                <p class="contact__desc section-desc-heading">
                                    Would like to talk?
                                </p>
                                <h3 class="contact__title section-title">
                                    Contact Details
                                </h3>
                            </div>
                            <form action="" method="post" autocomplete="on">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="content" placeholder="Nội dung" rows="8" maxlength="600" required></textarea>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="contact__btn">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d11144.790398555191!2d108.24555237925955!3d15.994775983622931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d15.9909237!2d108.2441499!5e0!3m2!1sen!2s!4v1730477141680!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    <!-- End Main -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-12 col-12">
                    <div class="footer__info">
                        <h2 class="footer__info-title">
                            Contact
                        </h2>
                        <div class="footer__info-detail">
                            <div class="footer__info-location">
                                <a href="https://www.google.com/maps/place/279+%C4%90.+Mai+%C4%90%C4%83ng+Ch%C6%A1n,+Ho%C3%A0+H%E1%BA%A3i,+Ng%C5%A9+H%C3%A0nh+S%C6%A1n,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@15.9902661,108.2439063,17z/data=!3m1!4b1!4m6!3m5!1s0x3142109909a5c113:0xec183e71a660c3b8!8m2!3d15.990261!4d108.2464866!16s%2Fg%2F11hd1zsth0?entry=ttu"
                                    target="_blank" class="footer__info-text">
                                    <strong>Address</strong> : 279 Mai Đăng Chơn - Ngũ Hành Sơn - Đà Nẵng
                                </a>
                            </div>
                            <p>
                                <a href="mailto:contact@tnna.vn" class="footer__info-text"><strong>Email</strong> :
                                    contact@tnna.vn</a>
                            </p>
                            <p>
                                <a href="tel:0876338837" class="footer__info-text"><strong>Hotline</strong> :
                                    0876338837</a>
                            </p>
                        </div>
                        <h3 class="footer__title">
                            Follow Us
                        </h3>
                        <div class="footer__social">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></i></a>
                            <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-6 col-6">
                    <div class="footer__place">
                        <h3 class="footer__title">
                            Top destination
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#" class="footer__link">Cầu sông Hàn</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Động Phong Nha</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Chợ Cồn</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Đình Thái, Con Kec</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Hội An</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-6 col-6">
                    <div class="footer__place">
                        <h3 class="footer__title">
                            Đéo biết đặt gì
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="about.php" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="blog.php" class="footer__link">Blog</a>
                            </li>
                            <li class="footer__item">
                                <a href="account.php" class="footer__link">Accont</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-lg-6 col-6">
                    <div class="footer__support">
                        <h3 class="footer__title">
                            Hỗ trợ
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="" class="footer__link">Quản trị viên</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Nhân viên hỗ trợ</a>
                            </li>
                        </ul>
                        <h3 class="footer__title footer__title--pay">
                            Pay
                        </h3>
                        <figure class="footer__img-wrap">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="../assets/bootstrap/jquery.slim.min.js"></script>
    <script src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/about.js"></script>
</body>

</html><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <!-- Header top -->
        <div class="header__top">
            <div class="container__fluid">
                <div class="header__top-inner">
                    <a href="" class="logo">
                        <img src="../assets/img/logo.png" alt="" class="logo__img">
                    </a>
                    <nav class="navbar">
                        <ul class="navbar__list">
                            <li class="navbar__item">
                                <a href="../" class="navbar__link">Home</a>
                            </li>
                            <li class="navbar__item">
                                <a href="about.php" class="navbar__link">About Us</a>
                            </li>
                            <li class="navbar__item">
                                <a href="destinations.php" class="navbar__link">Destinations </a>
                            </li>
                            <li class="navbar__item">
                                <a href="tour.php" class="navbar__link">Tour </a>
                            </li>
                            <li class="navbar__item">
                                <a href="blog.php" class="navbar__link">Blog </a>
                            </li>
                            <li class="navbar__item">
                                <a href="contact.php" class="navbar__link navbar__link--active">Contact Us </a>
                            </li>
                        </ul>
                    </nav>
                    <a href="account.php" class="header__account">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Main -->
    <main class="main">
        <!-- Contact Banner -->
        <section class="banner">
            <div class="container">
                <div class="banner__inner">
                    <p class="section-desc-heading banner__desc">
                        We'd love to hear from you!
                    </p>
                    <h2 class="section-title banner__title">
                        Contact Us
                    </h2>
                </div>
            </div>
        </section>
        <!-- Contact Form -->
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-sm-12">
                        <div class="inner-contact">
                            <div class="contact__info">
                                <div class="contact__top">
                                    <p class="contact__desc section-desc-heading">
                                        Would like to talk?
                                    </p>
                                    <h3 class="contact__title section-title">
                                        Contact Details
                                    </h3>
                                </div>
                                <p class="contact__desc-main">
                                    If you have a story to share or a question that has not been answered on our website, please get in touch with us via contact details listed below or fill in the form on the right.
                                </p>
                                <ul class="contact__list">
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link" href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                </ul>
                                <div class="contact__social">
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></i></a>
                                    <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-12">
                        <div class="contact-form">
                            <div class="contact__top">
                                <p class="contact__desc section-desc-heading">
                                    Would like to talk?
                                </p>
                                <h3 class="contact__title section-title">
                                    Contact Details
                                </h3>
                            </div>
                            <form action="" method="post" autocomplete="on">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="content" placeholder="Nội dung" rows="8" maxlength="600" required></textarea>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="contact__btn">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d11144.790398555191!2d108.24555237925955!3d15.994775983622931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d15.9909237!2d108.2441499!5e0!3m2!1sen!2s!4v1730477141680!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    <!-- End Main -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-12 col-12">
                    <div class="footer__info">
                        <h2 class="footer__info-title">
                            Contact
                        </h2>
                        <div class="footer__info-detail">
                            <div class="footer__info-location">
                                <a href="https://www.google.com/maps/place/279+%C4%90.+Mai+%C4%90%C4%83ng+Ch%C6%A1n,+Ho%C3%A0+H%E1%BA%A3i,+Ng%C5%A9+H%C3%A0nh+S%C6%A1n,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@15.9902661,108.2439063,17z/data=!3m1!4b1!4m6!3m5!1s0x3142109909a5c113:0xec183e71a660c3b8!8m2!3d15.990261!4d108.2464866!16s%2Fg%2F11hd1zsth0?entry=ttu"
                                    target="_blank" class="footer__info-text">
                                    <strong>Address</strong> : 279 Mai Đăng Chơn - Ngũ Hành Sơn - Đà Nẵng
                                </a>
                            </div>
                            <p>
                                <a href="mailto:contact@tnna.vn" class="footer__info-text"><strong>Email</strong> :
                                    contact@tnna.vn</a>
                            </p>
                            <p>
                                <a href="tel:0876338837" class="footer__info-text"><strong>Hotline</strong> :
                                    0876338837</a>
                            </p>
                        </div>
                        <h3 class="footer__title">
                            Follow Us
                        </h3>
                        <div class="footer__social">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></i></a>
                            <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-6 col-6">
                    <div class="footer__place">
                        <h3 class="footer__title">
                            Top destination
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#" class="footer__link">Cầu sông Hàn</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Động Phong Nha</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Chợ Cồn</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Đình Thái, Con Kec</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Hội An</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-lg-6 col-6">
                    <div class="footer__place">
                        <h3 class="footer__title">
                            Đéo biết đặt gì
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="about.php" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="blog.php" class="footer__link">Blog</a>
                            </li>
                            <li class="footer__item">
                                <a href="account.php" class="footer__link">Accont</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-lg-6 col-6">
                    <div class="footer__support">
                        <h3 class="footer__title">
                            Hỗ trợ
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="" class="footer__link">Quản trị viên</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Nhân viên hỗ trợ</a>
                            </li>
                        </ul>
                        <h3 class="footer__title footer__title--pay">
                            Pay
                        </h3>
                        <figure class="footer__img-wrap">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                            <img src="../assets/img/bidv.png" alt="" class="footer__img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="../assets/bootstrap/jquery.slim.min.js"></script>
    <script src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/about.js"></script>
</body>

</html>