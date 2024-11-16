@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tour.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tour-detail.css') }}">
@endpush
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
                                <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}"
                                    alt="{{ $tour->name }}" class="tour-detail__img">
                                <div class="tour-detail__thumb">
                                    @foreach ($tour->images->skip(1) as $image)
                                        <img src="{{ asset('assets/img/' . $image->image_url) }}" alt="{{ $tour->name }}"
                                            class="tour-detail__thumb-img">
                                    @endforeach
                                </div>
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
                                    @foreach ($tour->features as $feature)
                                        <p class="tour-detail__desc">
                                            - {{ $feature->feature }}
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
                                            <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}"
                                                alt="{{ $tour->name }}" class="timetable__img">
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
                                        <img src="{{ asset('assets/img/' . $tour->hotel->image) }}"
                                            alt="{{ $tour->hotel->name }}" class="tour-detail__hotel-img">
                                    </figure>
                                    <a href="{{ $tour->hotel->image }}" class="tour-detail__hotel-cap">
                                        {{ $tour->hotel->name }}
                                    </a>
                                </div>
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
                            @foreach ($suggestedTours as $suggestedTour)
                                <div class="tour__item">
                                    <figure class="tour__img-wrap">
                                        <img src="{{ asset('assets/img/' . $suggestedTour->images->first()->image_url) }}"
                                            alt="{{ $suggestedTour->name }}" class="tour__img">
                                    </figure>
                                    <div class="tour__item-body">
                                        <p class="tour__location">{{ $suggestedTour->location }}</p>
                                        <p class="tour__price tour__text">
                                            {{ number_format($suggestedTour->price_per_person) }} VNĐ</p>
                                        <div class="tour__item-info">
                                            <p class="tour__type tour__text">Adventure</p>
                                            <p class="tour__duration tour__text">2-3 Days</p>
                                        </div>
                                        <div class="tour__actions">
                                            <div class="tour__rating">
                                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                    class="fa-solid fa-star"></i>
                                            </div>
                                            <a href="{{ route('tours.show', $suggestedTour->id) }}"
                                                class="tour__action-btn tour__text">Xem Chi Tiết</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="tour-detail__booking">
                                <div class="tour-detail__title section-title">
                                    Giá tour
                                </div>
                                <form action="" class="booking__form">
                                    <div class="form-group">
                                        <div class="booking__date">
                                            <label for="bookingDate" class="booking__info-label">Ngày : </label>
                                            <input type="date" name="bookingDate" id="bookingDate" class="bookingDate">
                                        </div>
                                    </div>
                                    <div class="form-group booking__info">
                                        <label for="" class="booking__info-label">Số người</label>
                                        <label for="" class="booking__info-label">X</label>
                                        <label for="" class="booking__info-label">2,000,000</label>
                                        <div class="booking__controls">
                                            <button class="booking__btn booking-controls__minus">-</button>
                                            <input type="number" name="booking__number" id="booking__number"
                                                class="booking__number" min="1" value="1">
                                            <button class="booking__btn booking-controls__plus">+</button>
                                        </div>
                                    </div>
                                    <div class="form-group booking__total">
                                        <label for="" class="booking__info-label">Tổng giá tour : </label>
                                        <label for=""
                                            class="booking__info-label booking__info-label--price">2,000,000</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="booking__actions">
                                            <a href="" class="booking__action tour__action-btn">Liên hệ tư vấn</a>
                                            <button type="submit" class="tour__action-btn booking__btn--submit"
                                                name="submit">Đặt tour
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @push('scripts')
        <script src="{{ asset('assets/js/show.js') }}"></script>
    @endpush
@endsection
