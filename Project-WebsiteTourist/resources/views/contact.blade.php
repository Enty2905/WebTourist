@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endpush
@section('content')
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
                    <!-- Contact Info -->
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
                                    If you have a story to share or a question that has not been answered on our website,
                                    please get in touch with us via contact details listed below or fill in the form on the
                                    right.
                                </p>
                                <ul class="contact__list">
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link"
                                                href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link"
                                                href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="contact__text">
                                            <span>Email</span> : <a class="contact__link"
                                                href="mailto:contact@tnna.vn">contact@tnna.vn</a>
                                        </p>
                                    </li>
                                </ul>
                                <div class="contact__social">
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i
                                            class="fa-brands fa-tiktok"></i></i></a>
                                    <a href="https://www.instagram.com/entyyy_29/"><i
                                            class="fa-brands fa-instagram"></i></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form -->
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
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Số điện thoại" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="content" placeholder="Nội dung" rows="8" maxlength="600"
                                        required></textarea>
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
            <iframe class="contact__map"
                src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d11144.790398555191!2d108.24555237925955!3d15.994775983622931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d15.9909237!2d108.2441499!5e0!3m2!1sen!2s!4v1730477141680!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
@endsection
