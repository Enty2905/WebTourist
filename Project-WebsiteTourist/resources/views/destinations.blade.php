@extends('layouts.app')

@section('title', 'Destinations')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/destinations.css') }}">
@endpush
@section('content')
    <main class="main">
        <!-- Banner -->
        <section class="banner">
            <div class="container">
                <div class="banner__inner">
                    <p class="section-desc-heading banner__desc">
                        We'd love to hear from you!
                    </p>
                    <h1 class="section-title banner__title">
                        Destinations Banner
                    </h1>
                </div>
            </div>
        </section>
        <!-- Destinations -->
        <section class="destinations">
            <div class="container-fluid">
                <div class="destinations__top">
                    <p class="section-desc-heading destinations__desc">
                        We'd love to hear from you!
                    </p>
                    <h2 class="destinations__title section-title">
                        Top Destinations Popular
                    </h2>
                </div>
                <div class="destinations__gird">
                    @foreach ($destinations as $destination)
                        <div class="destinations__box {{ $destination['class'] }}">
                            <figure class="destinations__img-wrap">
                                <img src="{{ asset($destination['image']) }}" alt="{{ $destination['name'] }}"
                                    class="destinations__img">
                            </figure>
                            <div class="destinations__info">
                                <h3 class="destinations__location section-title">
                                    {{ $destination['name'] }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Stats -->
        <section class="stats">
            <div class="container">
                <div class="row">
                    @foreach ($stats as $stat)
                        <div class="col-xl-3 col-6">
                            <div class="stats__item">
                                <h3 class="stats__label">{{ $stat->label }}</h3>
                                <p class="stats__value" data-count="{{ $stat->value }}">0</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Reviews -->
        <section class="review">
            <div class="container">
                <div class="review__inner">
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-12 row__item">
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
    @push('scripts')
        <script src="{{ asset('assets/js/scroll.js') }}"></script>
    @endpush
@endsection
