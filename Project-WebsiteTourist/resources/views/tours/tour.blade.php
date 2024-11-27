@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tour.css') }}">
@endpush 

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
                    <li class="search__chose-item search__chose-item--active" data-action="default">
                        <span class="search__chose-text">Default</span>
                        <i class="fa-solid fa-circle"></i>
                    </li>
                    <li class="search__chose-item" data-action="price_high">
                        <span class="search__chose-text">Price to High</span>
                        <i class="fa-solid fa-arrow-up"></i>
                    </li>
                    <li class="search__chose-item" data-action="price_low">
                        <span class="search__chose-text">Price to Down</span>
                        <i class="fa-solid fa-arrow-down"></i>
                    </li>
                </ul>
                <div class="search__form-group">
                    <form class="search__form" id="searchForm" method="GET" action="{{ route('tours.tour') }}">
                        <div class="row">
                            <!-- Location -->
                            <div class="col-xl-3 col-6">
                                <div class="form-group">
                                    <label for="search__location" class="search__label">Tour location</label>
                                    <select name="search__location" id="search__location" class="search__select form-control">
                                        <option value="">Select Tour Location</option>
                                        <option value="qb" {{ request('search__location') == 'qb' ? 'selected' : '' }}>Quảng Bình</option>
                                        <option value="hue" {{ request('search__location') == 'hue' ? 'selected' : '' }}>Huế</option>
                                        <option value="dn" {{ request('search__location') == 'dn' ? 'selected' : '' }}>Đà Nẵng</option>
                                        <option value="qn" {{ request('search__location') == 'qn' ? 'selected' : '' }}>Quảng Nam</option>
                                    </select>
                                </div>
                            </div>
                    
                            <!-- Type -->
                            <div class="col-xl-3 col-6">
                                <div class="form-group">
                                    <label for="search__type" class="search__label">Tour Type</label>
                                    <select name="search__type" id="search__type" class="search__select form-control">
                                        <option value="">-- Chọn loại tour --</option>
                                        <option value="Phiêu lưu" {{ request('search__type') == 'Phiêu lưu' ? 'selected' : '' }}>Phiêu lưu</option>
                                        <option value="Thư giãn" {{ request('search__type') == 'Thư giãn' ? 'selected' : '' }}>Thư giãn</option>
                                        <option value="Tham quan thành phố" {{ request('search__type') == 'Tham quan thành phố' ? 'selected' : '' }}>Tham quan thành phố</option>
                                        <option value="Thiên nhiên & Động vật hoang dã" {{ request('search__type') == 'Thiên nhiên & Động vật hoang dã' ? 'selected' : '' }}>Thiên nhiên & Động vật hoang dã</option>
                                    </select>
                                </div>
                            </div>
                    
                            <!-- Duration -->
                            <div class="col-xl-3 col-6">
                                <div class="form-group">
                                    <label for="search__duration" class="search__label">Tour Duration</label>
                                    <select name="search__duration" id="search__duration" class="search__select form-control">
                                        <option value="">Select Duration</option>
                                        <option value="2_3" {{ request('search__duration') == '2_3' ? 'selected' : '' }}>2-3 Days</option>
                                        <option value="4_7" {{ request('search__duration') == '4_7' ? 'selected' : '' }}>4-7 Days</option>
                                        <option value="1w" {{ request('search__duration') == '1w' ? 'selected' : '' }}>1+ Week</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Submit -->
                            <div class="col-xl-3 col-6">
                                <div class="form-group">
                                    <button type="submit" class="tour__action-btn w-100">Search</button>
                                </div>
                            </div>
                        </div>
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="sort" id="sortInput">
                        <input type="hidden" name="on_sale" id="onSaleInput">
                    </form>
                </div>
            </div>
        </section>
        <section class="tour">
            <div class="container">
                <div class="tour__list" id="toursList">
                    <div class="row">
                        @foreach ($tours as $tour)
                            <div class="col-xl-4 col-6">
                                <div class="tour__item">
                                    <figure class="tour__img-wrap">
                                        @if ($tour->images->isNotEmpty())
                                            <img src="{{ asset('assets/img/' . $tour->images->first()->image_url) }}"
                                                 alt="{{ $tour->name }}" class="tour__img">
                                        @else
                                            <img src="{{ asset('assets/img/default-tour.jpg') }}" alt="Default Image" class="tour__img">
                                        @endif
                                    </figure>
                                    
                                    <div class="tour__item-body">
                                        <p class="tour__location line-clamp" style="--line-clamp:1;">{{ $tour->name }}</p>
                                        <p class="tour__price tour__text">
                                            ${{ number_format($tour->price_per_person, 2) }}
                                        </p>
                                        <div class="tour__item-info">
                                            <p class="tour__type tour__text line-clamp" style="--line-clamp:1;">{{ $tour->type }}</p>
                                            <p class="tour__duration tour__text">{{ $tour->duration }} Days</p>
                                        </div>
                                        <div class="tour__actions">
                                            <div class="tour__rating">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                @endfor
                                            </div>
                                            <a href="{{ Auth::check() ? route('tours.show', $tour->id) : 'javascript:void(0)' }}" 
                                                class="tour__action-btn tour__text" 
                                                onclick="{{ Auth::check() ? '' : 'return confirmLogin()' }}">
                                                 Details
                                             </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <div class="tour__pagination">
                                @if ($tours->hasPages())
                                    <ul class="pagination">
                                        <!-- Previous Button -->
                                        @if ($tours->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a href="{{ $tours->previousPageUrl() }}" class="page-link">Previous</a>
                                            </li>
                                        @endif
                        
                                        <!-- Current Page -->
                                        <li class="page-item disabled">
                                            <span class="page-link">{{ $tours->currentPage() }}</span>
                                        </li>
                        
                                        <!-- Next Button -->
                                        @if ($tours->hasMorePages())
                                            <li class="page-item">
                                                <a href="{{ $tours->nextPageUrl() }}" class="page-link">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Next</span>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    @push('scripts')
        <script src="{{ asset('assets/js/tour.js') }}"></script>
    @endpush
@endsection
