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
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <!-- Header top -->
        <div class="header__top">
            <div class="container__fluid">
                <div class="header__top-inner">
                    <a href="" class="logo">
                        <img src="./assets/img/logo.png" alt="" class="logo__img">
                    </a>
                    <nav class="navbar">
                        <ul class="navbar__list">
                            <li class="navbar__item">
                                <a href="./" class="navbar__link navbar__link--active">Home</a>
                            </li>
                            <li class="navbar__item">
                                <a href="./html/about.html" class="navbar__link">About Us</a>
                            </li>
                            <li class="navbar__item">
                                <a href="" class="navbar__link">Destinations </a>
                            </li>
                            <li class="navbar__item">
                                <a href="" class="navbar__link">Tour </a>
                            </li>
                            <li class="navbar__item">
                                <a href="" class="navbar__link">Blog </a>
                            </li>
                            <li class="navbar__item">
                                <a href="" class="navbar__link">Contact Us </a>
                            </li>
                        </ul>
                    </nav>
                    <a href="" class="header__account">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Header main -->
        <section class="header__banner">
            <h1 class="header__title">
                Wondrous City Tours
            </h1>
            <figure class="banner__img-wrap">
                <img src="./assets/img/Song_Huong_Hue.jpg" alt="" class="banner__img banner__img--active">
                <img src="./assets/img/Dam_Pha_Tam_Giang_Hue.jpg" alt="" class="banner__img active">
                <img src="./assets/img/Cau_Rong_DaNang.jpg" alt="" class="banner__img">
                <img src="./assets/img/Cau_Thuan_Phuoc_DaNang.jpg" alt="" class="banner__img">
                <img src="./assets/img/Bai_Tam_Non_Nuoc_DaNang.jpg" alt="" class="banner__img">
            </figure>
        </section>
    </header>
    <!-- End Header -->
    <!-- Main -->
    <main class="main">
        <section class="explore-adventure">
            <div class="container">
                <h2 class="section-title explore-adventure__title">
                    Explore Real Adventure
                </h2>
                <div class="explore-adventure__box-list">
                    <div class="row">
                        <div class="col-xl-3">
                            <article class="explore-adventure__box ">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Tent Camping
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Tent Camping
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box ">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Tent Camping
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box ">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Tent Camping
                                </p>
                            </article>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="choose-place">
            <div class="container">
                <p class="choose-place__desc choose-place__desc-heading section-desc-heading">
                    Destinations
                </p>
                <h2 class="section-title choose-place__title">
                    Choose Your Place
                </h2>
                <div class="choose-place__box-list">
                    <div class="row">
                        <div class="col-6">
                            <article class="choose-place__item">
                                <figure class="choose-place__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="choose-place__img" />
                                </figure>
                                <div class="choose-place__text">
                                    <h4 class="choose-place__item-desc section-desc-heading">
                                        Kinh Thành Huế
                                    </h4>
                                    <h3 class="choose-place__item-title">
                                        Huế
                                    </h3>
                                </div>
                            </article>
                        </div>
                        <div class="col-6">
                            <article class="choose-place__item">
                                <figure class="choose-place__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="choose-place__img" />
                                </figure>
                                <div class="choose-place__text">
                                    <h4 class="choose-place__item-desc section-desc-heading">
                                        Cầu vàng
                                    </h4>
                                    <h3 class="choose-place__item-title">
                                        Đà Nẵng
                                    </h3>
                                </div>
                            </article>
                        </div>
                        <div class="col-12">
                            <article class="choose-place__item">
                                <figure class="choose-place__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" class="choose-place__img" />
                                </figure>
                                <div class="choose-place__text">
                                    <h4 class="choose-place__item-desc section-desc-heading">
                                        Động Phong Nha
                                    </h4>
                                    <h3 class="choose-place__item-title">
                                        Quảng Bình
                                    </h3>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class=" col-6">
                        <div class="about__content">
                            <p class="section-desc-heading about__desc-heading">
                                About Us
                            </p>
                            <h2 class="section-title about__title-heading">
                                Explore all tour of the world with us.
                            </h2>
                            <p class="about__desc">
                                Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                injected
                                humour, or randomised words which don't look even slightly believable
                            </p>
                            <div class="about__list">
                                <div class="about__item">
                                    <div class="about__icon-wrap">
                                        <i class="about__icon fa-regular fa-compass"></i>
                                    </div>
                                    <section class="about__item-content">
                                        <h4 class="about__item-title">
                                            Tour guide
                                        </h4>
                                        <p class="about__item-desc">
                                            Lorem Ipsum available, but the majority have suffered alteration in some.
                                        </p>
                                    </section>
                                </div>
                                <div class="about__item">
                                    <div class="about__icon-wrap">
                                        <i class="about__icon fa-solid fa-briefcase"></i>
                                    </div>
                                    <section class="about__item-content">
                                        <h4 class="about__item-title">
                                            Friendly price
                                        </h4>
                                        <p class="about__item-desc">
                                            Lorem Ipsum available, but the majority have suffered alteration in some.
                                        </p>
                                    </section>
                                </div>
                                <div class="about__item">
                                    <div class="about__icon-wrap">
                                        <i class="about__icon fa-solid fa-umbrella-beach"></i>
                                    </div>
                                    <section class="about__item-content">
                                        <h4 class="about__item-title">
                                            Reliable tour </h4>
                                        <p class="about__item-desc">
                                            Lorem Ipsum available, but the majority have suffered alteration in some.
                                        </p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about__media">
                            <figure class="about__img-wrap">
                                <img src="./assets/img/ab1.png" alt="" class="about__img">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="featured__heading">
                            <p class="featured__desc section-desc-heading">
                                Featured Tours
                            </p>
                            <h2 class="featured__title section-title">
                                Most Popular Tours
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="featured__list">
                    <div class="row">
                        <div class="col-4">
                            <div class="featured__item">
                                <figure class="featured__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="featured__img">
                                </figure>
                                <div class="featured__item-body">
                                    <p class="featured__item-location">
                                        Huế
                                    </p>
                                    <h3 class="featured__item-title">
                                        Kinh Thành Huế
                                    </h3>
                                    <p class="featured__item-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa eligendi fugiat
                                        quae
                                        odio, repellendus, rem ex eius aspernatur laborum deleniti illum nemo
                                    </p>
                                    <div class="featured__info">
                                        <b class="featured__price">
                                            100 $
                                        </b>
                                        <div class="featured__time">
                                            <i class="fa-solid fa-clock featured__time-icon"></i>
                                            <span class="featured__time-text">
                                                14 day
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured__rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="featured__item">
                                <figure class="featured__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="featured__img">
                                </figure>
                                <div class="featured__item-body">
                                    <p class="featured__item-location">
                                        Huế
                                    </p>
                                    <h3 class="featured__item-title">
                                        Kinh Thành Huế
                                    </h3>
                                    <p class="featured__item-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa eligendi fugiat
                                        quae
                                        odio, repellendus, rem ex eius aspernatur laborum deleniti illum nemo
                                    </p>
                                    <div class="featured__info">
                                        <b class="featured__price">
                                            100 $
                                        </b>
                                        <div class="featured__time">
                                            <i class="fa-solid fa-clock featured__icon"></i>
                                            <span class="featured__time-text">
                                                14 day
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured__rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="featured__item">
                                <figure class="featured__img-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="featured__img">
                                </figure>
                                <div class="featured__item-body">
                                    <p class="featured__item-location">
                                        Huế
                                    </p>
                                    <h3 class="featured__item-title">
                                        Kinh Thành Huế
                                    </h3>
                                    <p class="featured__item-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa eligendi fugiat
                                        quae
                                        odio, repellendus, rem ex eius aspernatur laborum deleniti illum nemo
                                    </p>
                                    <div class="featured__info">
                                        <b class="featured__price">
                                            100 $
                                        </b>
                                        <div class="featured__time">
                                            <i class="fa-solid fa-clock featured__icon"></i>
                                            <span class="featured__time-text">
                                                14 day
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured__rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="highlights-video">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="highlights-video__content">
                            <h2 class="highlights-video__title section-title">
                                Traveling Highlights
                            </h2>
                            <p class="highlights-video__desc section-desc-heading">Your New Traveling Idea</p>
                            <div class="highlights-video__icon">
                                <a href="!#">
                                    <i class="fa-regular fa-circle-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="guides">
            <div class="container">
                <div class="guides__inner">
                    <div class="guides__top">
                        <div class="row">
                            <div class="col-12">
                                <p class="guides__desc section-desc-heading">
                                    Blog
                                </p>
                                <h2 class="guides__title section-title">
                                    Latest Travel Guides
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="guides__body">
                        <div class="row">
                            <div class="col-6">
                                <article class="guides__blog-main">
                                    <figure class="guides__img-wrap">
                                        <img src="./assets/img/blog_10-500x280.jpeg" alt="" class="guides__img">
                                    </figure>
                                    <div class="guides__blog-info">
                                        <p class="guides__date">02/09/2005 ' Quảng Bình</p>
                                        <h3 class="guides__title">10 Best Places to Visit in Dalhousie, Himacha</h3>
                                        <p class="guides__desc">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam laborum
                                            ipsum incidunt aspernatur, placeat qui animi illum libero eius quasi neque
                                            fugit laudantium necessitatibus doloribus! Commodi rerum cum quia suscipit!
                                        </p>
                                        <a href="" class="guides__action"> <span class="guides__action-text">Read
                                                more </span><i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-6">
                                <ul class="guides__list">
                                    <li class="guides__item">
                                        <figure class="guides__img-wrap--small">
                                            <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt=""
                                                class="guides__img--small">
                                        </figure>
                                        <div class="guides__blog-info--small">
                                            <p class="guides__date guides__date--small">02/09/2005 ' Quảng Bình</p>
                                            <h3 class="guides__title--small">10 Best Places to Visit in
                                                Dalhousie,Himachal</h3>
                                            <a href="" class="guides__action"> <span class="guides__action-text">View
                                                    more </span><i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </li>
                                    <li class="guides__item">
                                        <figure class="guides__img-wrap--small">
                                            <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt=""
                                                class="guides__img--small">
                                        </figure>
                                        <div class="guides__blog-info--small">
                                            <p class="guides__date guides__date--small">02/09/2005 ' Quảng Bình</p>
                                            <h3 class="guides__title--small">10 Best Places to Visit in
                                                Dalhousie,Himachal</h3>
                                            <a href="" class="guides__action"> <span class="guides__action-text">View
                                                    more </span><i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </li>
                                    <li class="guides__item">
                                        <figure class="guides__img-wrap--small">
                                            <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt=""
                                                class="guides__img--small">
                                        </figure>
                                        <div class="guides__blog-info--small">
                                            <p class="guides__date guides__date--small">02/09/2005 ' Quảng Bình</p>
                                            <h3 class="guides__title--small">10 Best Places to Visit in
                                                Dalhousie,Himachal</h3>
                                            <a href="" class="guides__action"> <span class="guides__action-text">View
                                                    more </span><i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="review">
            <div class="container">
                <div class="review__list row">
                    <div class="col-4">
                        <div class="review__item">
                            <div class="review__info">
                                <figure class="review__avt-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
                                </figure>
                                <div class="review__info-right">
                                    <h3 class="review__name">
                                        Anh Thái depzai
                                    </h3>
                                    <div class="review__rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review__desc line-clamp" style="--line-clamp : 7;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ipsam recusandae nobis
                                quod,
                                corrupti consequuntur harum quis ad possimus modi! Est delectus alias quae unde
                                exercitationem corporis accusantium suscipit veniam!
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="review__item">
                            <div class="review__info">
                                <figure class="review__avt-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
                                </figure>
                                <div class="review__info-right">
                                    <h3 class="review__name">
                                        Concho Quang
                                    </h3>
                                    <div class="review__rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review__desc line-clamp" style="--line-clamp : 7;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ipsam recusandae nobis
                                quod,
                                corrupti consequuntur harum quis ad possimus modi! Est delectus alias quae unde
                                exercitationem corporis accusantium suscipit veniam!
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="review__item">
                            <div class="review__info">
                                <figure class="review__avt-wrap">
                                    <img src="./assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
                                </figure>
                                <div class="review__info-right">
                                    <h3 class="review__name">
                                        Concho Nam
                                    </h3>
                                    <div class="review__rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review__desc line-clamp" style="--line-clamp : 7;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ipsam recusandae nobis
                                quod,
                                corrupti consequuntur harum quis ad possimus modi! Est delectus alias quae unde
                                exercitationem corporis accusantium suscipit veniam!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-tiktok"></i></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></i></a>
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
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Blog</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Accont</a>
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
                            <img src="./assets/img/bidv.png" alt="" class="footer__img">
                            <img src="./assets/img/bidv.png" alt="" class="footer__img">
                            <img src="./assets/img/bidv.png" alt="" class="footer__img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="./assets/bootstrap/jquery.slim.min.js"></script>
    <script src="./assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>

</html>