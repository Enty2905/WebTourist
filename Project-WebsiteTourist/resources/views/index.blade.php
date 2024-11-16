@extends('layouts.app')

@section('content')
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
                                    <img src="{{ asset('assets/img/Suoi_Mooc_QuangBinh.jpg') }}"
                                        class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Suối Moọc
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="{{ asset('assets/img/Luot_Song.jpg') }}" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Chèo súp
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box ">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="{{ asset('assets/img/Du_Luon_DaNang.jpg') }}"
                                        class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Dù lượn
                                </p>
                            </article>
                        </div>
                        <div class="col-xl-3">
                            <article class="explore-adventure__box ">
                                <figure class="explore-adventure__img-wrap">
                                    <img src="{{ asset('assets/img/Am_Thuc_Hue.jpg') }}" class="explore-adventure__img" />
                                </figure>
                                <p class="explore-adventure__desc">
                                    Ẩm thực
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
                                    <img src="{{ asset('assets/img/Hue1.jpg') }}" class="choose-place__img" />
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
                                    <img src="{{ asset('assets/img/Cau_Rong_DaNang.jpg') }}" class="choose-place__img" />
                                </figure>
                                <div class="choose-place__text">
                                    <h4 class="choose-place__item-desc section-desc-heading">
                                        Cầu rồng
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
                                    <img src="{{ asset('assets/img/Dong_Phong_Nha_QuangBinh.jpg') }}"
                                        class="choose-place__img" />
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
                    <div class="col-6">
                        <div class="about__content">
                            <p class="section-desc-heading about__desc-heading">
                                About Us
                            </p>
                            <h2 class="section-title about__title-heading">
                                Explore all tour of the world with us.
                            </h2>
                            <p class="about__desc">
                                Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
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
                                            Reliable tour
                                        </h4>
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
                                <img src="{{ asset('assets/img/ab1.png') }}" alt="" class="about__img">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="featured">
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
                        @foreach ($tours as $tour)
                            <div class="col-4">
                                <div class="featured__item">
                                    <figure class="featured__img-wrap">
                                        <img src="{{ asset('assets/img/' . $tour->image) }}" alt=""
                                            class="featured__img">
                                    </figure>
                                    <div class="featured__item-body">
                                        <p class="featured__item-location">{{ $tour->location }}</p>
                                        <h3 class="featured__item-title">{{ $tour->title }}</h3>
                                        <p class="featured__item-desc">{{ $tour->description }}</p>
                                        <div class="featured__info">
                                            <b class="featured__price">{{ $tour->price }} $</b>
                                            <div class="featured__time">
                                                <i class="fa-solid fa-clock featured__time-icon"></i>
                                                <span class="featured__time-text">{{ $tour->duration }} day</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured__rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star {{ $i < $tour->rating ? 'active' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}

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
                                <a href="#!">
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
                                        <img src="{{ asset('assets/img/blog_10-500x280.jpeg') }}" alt=""
                                            class="guides__img">
                                    </figure>
                                    <div class="guides__blog-info">
                                        <p class="guides__date">02/09/2005 ' Quảng Bình</p>
                                        <h3 class="guides__title">10 Best Places to Visit in Dalhousie, Himacha</h3>
                                        <p class="guides__desc">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam laborum
                                            ipsum incidunt aspernatur, placeat qui animi illum libero eius quasi neque
                                            fugit laudantium necessitatibus doloribus! Commodi rerum cum quia suscipit!
                                        </p>
                                        <a href="#" class="guides__action">
                                            <span class="guides__action-text">Read more</span>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-6">
                                {{-- <ul class="guides__list">
                                    @foreach ($blogs as $blog)
                                        <li class="guides__item">
                                            <figure class="guides__img-wrap--small">
                                                <img src="{{ asset('assets/img/' . $blog->image) }}" alt=""
                                                    class="guides__img--small">
                                            </figure>
                                            <div class="guides__blog-info--small">
                                                <p class="guides__date guides__date--small">{{ $blog->date }} '
                                                    {{ $blog->location }}</p>
                                                <h3 class="guides__title--small">{{ $blog->title }}</h3>
                                                <a href="#" class="guides__action">
                                                    <span class="guides__action-text">View more</span>
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- Reviews -->
         <section class="review">
            <div class="container">
                <div class="review__inner">
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-12">
                                <div class="review__item">
                                    <figure class="review__avt-wrap">
                                        <img src="{{ asset($review->image) }}" alt="{{ $review->name }}"
                                            class="review__avt">
                                    </figure>
                                    <p class="review__desc line-clamp" style="--line-clamp: 4;">
                                        {{ $review->desc }}
                                    </p>
                                    <div class="review__info">
                                        <h3 class="review__name">{{ $review->name }}</h3>
                                        <div class="review__rating">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="review__controls">
                <button class="review__btn review__btn-l">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="review__btn review__btn-r">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </section>
    </main>
@endsection
