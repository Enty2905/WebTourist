<header class="header">
    <!-- Header top -->
    <div class="header__top">
        <div class="container__fluid">
            <div class="header__top-inner">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo__img">
                </a>
                <nav class="navbar">
                    <ul class="navbar__list">
                        <li class="navbar__item">
                            <a href="{{ url('/') }}"
                                class="navbar__link {{ request()->is('/') ? 'navbar__link--active' : '' }}">Home</a>
                        </li>
                        <li class="navbar__item">
                            <a href="{{ url('/about') }}"
                                class="navbar__link {{ request()->is('about') ? 'navbar__link--active' : '' }}">About
                                Us</a>
                        </li>
                        <li class="navbar__item">
                            <a href="{{ url('/destinations') }}"
                                class="navbar__link {{ request()->is('destinations') ? 'navbar__link--active' : '' }}">Destinations</a>
                        </li>
                        <li class="navbar__item">
                            <a href="{{ url('/tour') }}"
                                class="navbar__link {{ request()->is('tour') ? 'navbar__link--active' : '' }}">Tour</a>
                        </li>
                        <li class="navbar__item">
                            <a href="{{ url('/blog') }}"
                                class="navbar__link {{ request()->is('blog') ? 'navbar__link--active' : '' }}">Blog</a>
                        </li>
                        <li class="navbar__item">
                            <a href="{{ url('/contact') }}"
                                class="navbar__link {{ request()->is('contact') ? 'navbar__link--active' : '' }}">Contact
                                Us</a>
                        </li>
                    </ul>
                </nav>
                <a href="{{ Auth::check() ? url('/profile') : 'javascript:void(0)' }}" class="header__account"
                    onclick="{{ Auth::check() ? '' : 'return confirmLogin()' }}">
                    <i class="fa-regular fa-user"></i>
                </a>
            </div>
        </div>
    </div>

    @if (request()->is('/'))
        <section class="header__banner">
            <h1 class="header__title">
                Wondrous City Tours
            </h1>
            <figure class="header__banner-img-wrap">
                <img src="{{ asset('assets/img/Song_Han_DaNang.jpg') }}" alt=""
                    class="header__banner-img header__banner-img--active">
                <img src="{{ asset('assets/img/Dong_Phong_Nha_QuangBinh.jpg') }}" alt=""
                    class="header__banner-img">
                <img src="{{ asset('assets/img/Ba_Na_Hill_DaNang.jpg') }}" alt="" class="header__banner-img">
                <img src="{{ asset('assets/img/Bao_Tang_Mi_Thuat_Hue.jpg') }}" alt=""
                    class="header__banner-img">
                <img src="{{ asset('assets/img/Deo_Hai_Van_DaNang.jpg') }}" alt="" class="header__banner-img">
            </figure>
        </section>
    @endif
</header>
