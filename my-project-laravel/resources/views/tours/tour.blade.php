@extends('layouts.app')

@section('content')
<main class="main">
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

    <section class="search">
        <div class="container">
            <ul class="search__chose-list">
                <li class="search__chose-item search__chose-item--active">
                    <span class="search__chose-text">Default</span>
                    <i class="fa-solid fa-circle"></i>
                </li>
                <li class="search__chose-item">
                    <span class="search__chose-text">Price to High</span>
                    <i class="fa-solid fa-arrow-up"></i>
                </li>
                <li class="search__chose-item">
                    <span class="search__chose-text">Price to Down</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </li>
                <li class="search__chose-item">
                    <span class="search__chose-text">On sale</span>
                    <i class="fa-regular fa-circle-check"></i>
                </li>
            </ul>
            <div class="search__form-group">
                <form class="search__form" action="">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__location" class="search__label">Tour location</label>
                                <select name="search__location" id="search__location" class="search__select form-control">
                                    <option class="search__option" value="">Select Tour Location</option>
                                    <option class="search__option" value="qb">Quảng Bình</option>
                                    <option class="search__option" value="hue">Huế</option>
                                    <option class="search__option" value="dn">Đà Nẵng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__type" class="search__label">Tour Type</label>
                                <select name="search__type" id="search__type" class="search__select form-control">
                                    <option class="search__option" value="">Select Tour Type</option>
                                    <option class="search__option" value="adventure">Adventure</option>
                                    <option class="search__option" value="relaxation">Relaxation</option>
                                    <option class="search__option" value="city">City Tour</option>
                                    <option class="search__option" value="nature">Nature & Wildlife</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="search__duration" class="search__label">Tour Duration</label>
                                <select name="search__duration" id="search__duration" class="search__select form-control">
                                    <option class="search__option" value="">Select Duration</option>
                                    <option class="search__option" value="1">1 Day</option>
                                    <option class="search__option" value="2">2-3 Days</option>
                                    <option class="search__option" value="3">4-7 Days</option>
                                    <option class="search__option" value="4">1+ Week</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <button class="btn form-control search__btn">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="tour">
        <div class="container">
            <div class="tour__list">
                <div class="row">
                    @foreach ($tours as $tour)
                        <div class="col-4">
                            <div class="tour__item">
                                <figure class="tour__img-wrap">
                                    <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}" alt="{{ $tour->name }}" class="tour__img">
                                </figure>
                                <div class="tour__item-body">
                                    <p class="tour__location">{{ $tour->location }}</p>
                                    <p class="tour__price tour__text">${{ $tour->price }}</p>
                                    <div class="tour__item-info">
                                        <p class="tour__type tour__text">{{ $tour->type }}</p>
                                        <p class="tour__duration tour__text">{{ $tour->duration }} Days</p>
                                    </div>
                                    <div class="tour__actions">
                                        <div class="tour__rating">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </div>
                                        <a href="{{ route('tours.show', $tour->id) }}" class="tour__action tour__text">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <div class="tour__pagination">
                        <div class="tour__pagination-prev tour__pagination-btn">Previous</div>
                        <div class="tour__pagination-page">1</div>
                        <div class="tour__pagination-next tour__pagination-btn">Next</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
