{{-- top header (sign in) --}}
<nav class="colorlib-nav" role="navigation">


    <div class="top">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-6">
                    <ul class="sub-nav d-flex   ">
                        <li class=" "><a class=" font-xs  lw-text"
                            href="{{ route('about-us') }}">{{ __('About Us') }}</a></li>
                        <li class="  "><a class=" font-xs lw-text"
                                href="{{ route('contact-us') }}">{{ __('Contact Us') }}</a></li>
                        @if(Auth::check())
                        <li class="  ">
                            <span class=" font-xs w-text"> {{Auth::user()->balance}}</span>
                            <img src="/img/svg/dollar.svg" class="icon-log" alt="hotel-hub" />

                        </li>
                        @endif
                        @foreach($available_locales as $locale_name => $available_locale)
                        @if($available_locale === $current_locale)
                            <span class="ml-2 mr-2 text-gray-700 d-none">{{ $locale_name }}</span>
                        @else
                        <li class="  "><a class=" font-xs  w-text" href="/language/{{ $available_locale }}">{{ $locale_name }}</a></li>


                        @endif
                        @endforeach

                    </ul>
                </div>
                @if(Auth::check())
                <div class="col-md-6 text-end log-d ">
                    <div class="dropdown-login">
                        <div class="dropbtn-login">
                            <img src="/img/svg/person.svg " class="icon-log" alt="hotel-hub" />
                            <span class="black-text blue-text bold">   {{Auth::user()->name}}</span>
                            <img src="/img/svg/dropdown.svg " class="icon-log" alt="hotel-hub" />
                        </div>
                        <div class="dropdown-content">
                            <a href="#" class="font-xs blue-text">
                                <img src="/img/svg/dollar-b.svg" class="icon-log" alt="hotel-hub" />
                                <span class="font-xs blue-text bold">      {{Auth::user()->balance}}</span>
                            </a>
                            @if(Auth::user()->role==1)
                            <a href="/nova/dashboards/main" class="font-xs blue-text bold"
                                target="_blank">
                                <img src="/img/svg/setting.svg" class="icon-log" alt="hotel-hub" /><span class="font-xs blue-text"> {{__('Control Panel')}}</span>

                            </a>
                            @else

                            <a href="{{ route('setting', Auth::user()->id) }}" class="font-xs blue-text bold"
                            target="_blank">
                            <img src="/img/svg/setting.svg" class="icon-log" alt="hotel-hub" /><span class="font-xs blue-text"> {{__('Setting')}}</span>

                            </a>
                            @endif
                            <a href="/logout" class="font-xs blue-text"
                               ><img src="/img/svg/logout.svg" class="icon-log" alt="hotel-hub" />
                               <span class="font-xs blue-text bold"> {{ __('logout') }}</span></a>

                        </div>
                    </div>


                </div>
                @else
                <div class="col-md-6 text-end log-d ">
                    <div class="dropdown-login">
                        <a href="/login" class="dropbtn-login">
                            <img src="/img/svg/lock.svg " class="icon-log" alt="hotel-hub" />
                            <span class="font-xs blue-text">{{ __('Login') }}</span>

                        </a>

                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Main header -->
    <nav class="navbar navbar-expand-lg navbar-dark  ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}"><img src="/img/svg/Logo.png " class="custom-logo"
                    alt="hotel-hub" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto nav-headers">
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link font-xs b-text"  href="{{route('advancedSearch')}}"   >
                            {{ __('Advanced Search') }} </a>

                    </li>
                    <!-- .................. -->
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle font-xs b-text " href="#" data-bs-toggle="dropdown">
                            {{ __('Provinces') }} </a>
                            <div class="dropdown-menu megamenu" role="menu">
                                <div class="container">
                                    <div class="row g-5">
                                        <div class="col    ">
                                            <div class="col-megamenu">
                                                <a href="#">
                                                    <h6 class="title mega-font blue-text">{{ __('Northern') }} {{ __('Syria') }}
                                                        <img class="arrow-icon" src="/img/svg/right-b-arrow.svg"
                                                            alt="Card image cap">
                                                    </h6>
                                                </a>
                                                <ul class="list-unstyled">
                                                    <li><a href="/cities/13/hotels"
                                                            class="mega-font-p blue-text">{{ __('Aleppo') }}</a>
                                                    </li>
                                                    <li><a href="/cities/20/hotels"
                                                            class="mega-font-p blue-text">{{ __('Idlib') }}</a>
                                                    </li>
                                                    <li><a href="/cities/19/hotels"
                                                            class="mega-font-p blue-text">{{ __('Hama') }}</a>
                                                    </li>


                                                </ul>
                                            </div> <!-- col-megamenu.// -->
                                        </div><!-- end col-3 -->
                                        <div class="col     ">
                                            <div class="col-megamenu">
                                                <a href="#">
                                                    <h6 class="title mega-font blue-text">{{ __('Southern') }} {{ __('Syria') }}
                                                        <img class="arrow-icon" src="/img/svg/right-b-arrow.svg"
                                                            alt="Card image cap">
                                                    </h6>
                                                </a>
                                                <ul class="list-unstyled">
                                                    <li><a href="/cities/21/hotels"
                                                            class="mega-font-p blue-text">{{ __('Daraa') }}</a>
                                                    </li>
                                                    <li><a href="/cities/22/hotels"
                                                            class="mega-font-p blue-text">{{ __('As Suwayda') }}</a></li>
                                                    <li><a href="/cities/24/hotels"
                                                            class="mega-font-p blue-text">{{ __('Quneitra') }}</a>
                                                    </li>

                                                </ul>
                                            </div> <!-- col-megamenu.// -->
                                        </div><!-- end col-3 -->



                                        <div class="col     ">
                                            <div class="col-megamenu">
                                                <a href="#">
                                                    <h6 class="title mega-font blue-text">
                                                        {{ __('Eastern') }} {{ __('Syria') }}<img class="arrow-icon"
                                                            src="/img/svg/right-b-arrow.svg" alt="Card image cap"></h6>
                                                </a>
                                                <ul class="list-unstyled">
                                                    <li><a href="/cities/17/hotels"
                                                            class="mega-font-p blue-text">{{ __('Deir ez-Zur') }}</a>
                                                    </li>
                                                    <li><a href="/cities/23/hotels"
                                                            class="mega-font-p blue-text">{{ __('Al-Hasakah') }}</a>
                                                    </li>
                                                    <li><a href="/cities/15/hotels"
                                                        class="mega-font-p blue-text">{{ __('Ar Raqqah') }}</a>
                                                </li>
                                                </ul>
                                            </div> <!-- col-megamenu.// -->
                                        </div><!-- end col-3 -->
                                        <div class="col    ">
                                            <div class="col-megamenu">
                                                <a href="#">
                                                    <h6 class="title mega-font blue-text">{{ __('Western') }} {{ __('Syria') }} <img
                                                            class="arrow-icon" src="/img/svg/right-b-arrow.svg"
                                                            alt="Card image cap"></h6>
                                                </a>
                                                <ul class="list-unstyled">
                                                    <li><a href="/cities/11/hotels"
                                                            class="mega-font-p blue-text">{{ __('Damasscus') }}</a>
                                                    </li>
                                                    <li><a href="/cities/25/hotels"
                                                            class="mega-font-p blue-text">{{ __('Rural') }} {{ __('Damasscus') }}</a>
                                                    </li>
                                                    <li><a href="/cities/14/hotels"
                                                            class="mega-font-p blue-text">{{ __('Homs') }}</a>
                                                    </li>
                                                    <li><a href="/cities/16/hotels"
                                                            class="mega-font-p blue-text">{{ __('Tartus') }}</a>
                                                    </li>
                                                    <li><a href="/cities/12/hotels"
                                                            class="mega-font-p blue-text">{{ __('Lattakia') }}</a>
                                                    </li>

                                                </ul>
                                            </div> <!-- col-megamenu.// -->
                                        </div><!-- end col-3 -->


                                    </div><!-- end row -->
                                </div>
                            </div>
                    </li>
                </ul>

            </div> <!-- navbar-collapse.// -->

        </div> <!-- container-fluid.// -->
    </nav>
</nav>
