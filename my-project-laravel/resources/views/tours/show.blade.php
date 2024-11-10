@extends('layouts.app')

@section('content')
<main class="main">
    <section class="banner">
        <div class="container">
            <div class="banner__inner">
                <p class="section-desc-heading banner__desc">
                    Chúng tôi rất mong muốn nhận được phản hồi từ bạn!
                </p>
                <h1 class="section-title banner__title">
                    {{ $tour->name }}
                </h1>
            </div>
        </div>
    </section>

    <section class="tour-detail">
        <div class="container">
            <div class="tour-detail__inner">
                <div class="row">
                    <div class="col-12">
                        <div class="tour-detail__top">
                            <p class="section-desc-heading">
                                {{ $tour->location }}
                            </p>
                            <h2 class="tour-detail__title-top section-title">
                                {{ $tour->name }}
                            </h2>
                        </div>
                    </div>

                    <div class="col-8">
                        <figure class="tour-detail__img-wrap">
                            <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}" alt="{{ $tour->name }}" class="tour-detail__img">
                        </figure>

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Khái niệm
                            </h3>
                            <p class="tour-detail__desc">
                                {{ $tour->description }}
                            </p>
                        </div>

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Chuyến đi của chúng tôi có gì?
                            </h3>
                            <div class="tour-detail__experience">
                                @foreach ($tour->schedules as $schedule)
                                    <p class="tour-detail__desc">
                                        - {{ $schedule->title }}: {{ $schedule->description }}
                                    </p>
                                @endforeach
                            </div>
                        </div>

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Chương trình
                            </h3>
                            <div class="timetable">
                                @foreach ($tour->schedules as $schedule)
                                    <div class="timetable-item">
                                        <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}" alt="{{ $tour->name }}" class="timetable__img">
                                        <div class="timetable-info">
                                            <h4 class="timetable-info__time">
                                                Ngày {{ $schedule->day_number }}
                                            </h4>
                                            <p class="timetable-info__desc">
                                                {{ $schedule->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Khách sạn
                            </h3>
                            <div class="tour-detail__hotel">
                                <figure class="tour-detail__hotel-img-wrap">
                                    <img src="{{ asset('assets/img/' . $tour->hotel->image) }}" alt="{{ $tour->hotel->name }}" class="tour-detail__hotel-img">
                                </figure>
                                <a href="{{ $tour->hotel->image }}" class="tour-detail__hotel-cap">
                                    {{ $tour->hotel->name }}
                                </a>
                            </div>
                        </div>
                        

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Giá cả
                            </h3>
                            <ul class="tour-detail__info">
                                <li class="tour-detail__price">
                                    <strong>1 người : </strong> <span>{{ number_format($tour->price_per_person) }} VNĐ</span>
                                </li>
                                <li class="tour-detail__price">
                                    <strong>2 người : </strong> <span>{{ number_format($tour->price_per_person * 2) }} VNĐ</span>
                                </li>
                                <li class="tour-detail__price">
                                    <strong>4 người : </strong> <span>{{ number_format($tour->price_per_person * 4) }} VNĐ</span>
                                </li>
                                <li class="tour-detail__price">
                                    <strong>Đoàn 15 người : </strong> <span>{{ number_format($tour->price_per_person * 15) }} VNĐ</span>
                                </li>
                            </ul>
                        </div>

                        <div class="tour-detail__section">
                            <h3 class="tour-detail__title section-title">
                                Những Điều cần lưu ý
                            </h3>
                            <div class="tour-detail__note">
                                <p class="tour-detail__desc">
                                    - Di chuyển bằng ô tô du lịch của Cty.
                                </p>
                                <p class="tour-detail__desc">
                                    - Cũng có xe máy cho những ai thích đi xe máy.
                                </p>
                                <p class="tour-detail__desc">
                                    - Tổ chức ăn uống theo nhu cầu của khách.
                                </p>
                                <p class="tour-detail__desc">
                                    - Trưởng đoàn và hướng dẫn viên phục vụ suốt tuyến.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="tour__item">
                            <figure class="tour__img-wrap">
                                <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}" alt="{{ $tour->name }}" class="tour__img">
                            </figure>
                            <div class="tour__item-body">
                                <p class="tour__location">{{ $tour->location }}</p>
                                <p class="tour__price tour__text">{{ number_format($tour->price_per_person) }} VNĐ</p>
                                <div class="tour__item-info">
                                    <p class="tour__type tour__text">Adventure</p>
                                    <p class="tour__duration tour__text">2-3 Days</p>
                                </div>
                                <div class="tour__actions">
                                    <div class="tour__rating">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                    <a class="tour__action tour__text" href="{{ route('tours.book', $tour->id) }}">Đặt Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
