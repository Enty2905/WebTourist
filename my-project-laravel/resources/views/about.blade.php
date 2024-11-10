<?php
$visitors = 1000;
$tours = 50;
$fiveStarReviews = 200;
$positiveFeedback = 95;
?>
@extends('layouts.app')

@section('content')
    <!-- Main -->
    <main class="main">
        <!-- Mission -->
        <section class="about-mission">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-mission__top">
                            <p class="about-mission__desc-heading section-desc-heading">
                                About
                            </p>
                            <h2 class="about-mission__title section-title">
                                About mission Mission
                            </h2>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="about-mission__content">
                            <h3 class="about-mission__content-title about__title">
                                Mang đến cho bạn chuyến du lịch tuyệt vời nhất
                            </h3>
                            <p class="about-mission__desc">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur
                                ut
                                aspernatur neque! Quasi explicabo beatae ipsum deleniti fuga vitae eaque reiciendis id
                                sint quos debitis, labore tempora obcaecati.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur
                                ut
                                aspernatur
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <figure class="about-mission__media">
                            <img src="../assets/img/VKU (3).jpg" alt="" class="about-mission__img">
                        </figure>
                    </div>
                    <div class="col-4">
                        <div class="about-mission__content">
                            <h3 class="about-mission__content-title about__title">
                                Mang đến cho bạn chuyến du lịch tuyệt vời nhất
                            </h3>
                            <p class="about-mission__desc">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur
                                ut
                                aspernatur neque! Quasi explicabo beatae ipsum deleniti fuga vitae eaque reiciendis id
                                sint quos debitis, labore tempora obcaecati.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur
                                ut
                                aspernatur
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Story -->
        <section class="about-story">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-story__top">
                            <p class="about-story__desc-heading section-desc-heading">
                                About
                            </p>
                            <h2 class="about-story__title section-title">
                                About us Story
                            </h2>
                        </div>
                    </div>
                    <div class="col-6">
                        <figure class="about-story__media">
                            <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="about-story__img">
                        </figure>
                    </div>
                    <div class="col-6">
                        <h3 class="about-story__content-title about__title">
                            Chúng tôi là ai ?
                        </h3>
                        <p class="about-story__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur ut
                            aspernatur neque! Quasi explicabo beatae ipsum deleniti fuga vitae eaque reiciendis id
                            sint quos debitis, labore tempora obcaecati.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur ut
                            aspernatur
                        </p>
                    </div>
                    <div class="col-6">
                        <h3 class="about-story__content-title about__title">
                            Tại sao lại có website này ?
                        </h3>
                        <p class="about-story__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur ut
                            aspernatur neque! Quasi explicabo beatae ipsum deleniti fuga vitae eaque reiciendis id
                            sint quos debitis, labore tempora obcaecati.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio temporibmission pariatur ut
                            aspernatur
                        </p>
                    </div>
                    <div class="col-6">
                        <figure class="about-story__media">
                            <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="about-story__img">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- Stats -->
        <section class="stats">
            <div class="container">
                <div class="stats__inner">
                    <div class="row">
                        <div class="col-3">
                            <div class="stats__item">
                                <h3 class="stats__label about__title">Số lượng khách đã truy cập</h3>
                                <p class="stats__value about__title" data-count="<?php echo $visitors; ?>">0</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stats__item">
                                <h3 class="stats__label about__title">Đánh giá 5*</h3>
                                <p class="stats__value about__title" data-count="<?php echo $fiveStarReviews; ?>">0</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stats__item">
                                <h3 class="stats__label about__title">Số Tour Đã Được Đặt</h3>
                                <p class="stats__value about__title" data-count="<?php echo $tours; ?>">0</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stats__item">
                                <h3 class="stats__label about__title"> Phản Hồi Tích Cực</h3>
                                <p class="stats__value about__title" data-count="<?php echo $positiveFeedback; ?>">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Founders -->
        <section class="founders">
            <div class="container">
                <div class="founders__list">
                    <div class="row">
                        <div class="col-12">
                            <div class="founders__top">
                                <p class="section-desc-heading">
                                    Founders
                                </p>
                                <h1 class="section-title">
                                    Founders
                                </h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="founders__item">
                                <figure class="founders__img-wrap">
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="founders__img">
                                </figure>
                                <div class="founders__item-content">
                                    <h3 class="founders__name about__title">Anh Thái đẹp zai</h3>
                                    <p class="founders__job">No1 JIT</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="founders__item">
                                <figure class="founders__img-wrap">
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="founders__img">
                                </figure>
                                <div class="founders__item-content">
                                    <h3 class="founders__name about__title">Lê Xuân Hòi Nôm</h3>
                                    <p class="founders__job">Chiwawa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="founders__item">
                                <figure class="founders__img-wrap">
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="founders__img">
                                </figure>
                                <div class="founders__item-content">
                                    <h3 class="founders__name about__title">Chần Chình Choang</h3>
                                    <p class="founders__job">Wan wan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="stats__overlay" class="stats__overlay" style="display: none;">
                    <img id="stats__overlay-img" class="stats__overlay-img" src="" alt="">
                </div>
            </div>
        </section>
        <!-- Review -->
        <section class="review">
            <div class="container">
                <div class="review__list row">
                    <div class="col-4">
                        <div class="review__item">
                            <div class="review__info">
                                <figure class="review__avt-wrap">
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
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
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
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
                                    <img src="../assets/img/Ba_Na_Hill_DaNang.jpg" alt="" class="review__avt">
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
@endsection
