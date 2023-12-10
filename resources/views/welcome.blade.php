@extends('layouts.master')
@section('content')




<section class="home-banner ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="swiper swiper1">
                    <div class="swiper-wrapper">
                        <!-- Slides for swiper1 -->
                        @foreach ($offers as $offer)
                        <div class="swiper-slide js-fullheight" style="height:380px !important;background-color: #fff !important">


                                                        <div class="banner-text-animate mb-4">
                                                            <h2 class="title-b blue-text">{{ __($offer->description) }}</h2>
                                                            <a href="{{$offer->url}}" target="_blank">
                                                                <span class="apply-font y-text ">{{ __('Know more') }}</span>
                                                                    <img class="arrow-icon" src="/img/svg/right-y-arrow.svg"
                                                                        alt="Card image cap">

                                                            </a>
                                                        </div>
                        </div>


                        @endforeach

                    </div>
                        <div class="swiper-button-prev swiper1-prev  s-b-p">
                            <img src="./img/svg/left-y.svg" alt="" style="scale:1.6">
                        </div>

                        <div class="swiper-button-next swiper1-next s-b-n">
                            <img src="./img/svg/right-y-arrow.svg" alt="" style="scale:1.5">
                        </div>

                </div>
            </div>

            <div class="col-lg-6">

                <div class="swiper swiper3">
                        <div class="swiper-wrapper">
                            @foreach ($offers as $offer)
                            <div class="swiper-slide js-fullheight" style="height:380px !important;background-color: #fff !important">
                                <div class="slide-img " style="background-image: url(/storage/screens/{{$offer->image}});"></div>
                            </div>
                            @endforeach
                        </div>

                        <div class="home-banner-nav" style="left:0%;    bottom: 42%;">
                            <div class="swiper-pagination nav-progressbar"></div>
                        </div>
                </div>
            </div>

        </div>
    </div>

</section>

<section class="mb-5" id="besthotels" style="display: none">

    <div class="container my-5" style="width: 60%">
        <h1 class="text-center">Explore Our Products</h1>
        <div class="row my-5  product-radios" style="background-color: #857d7d">
            <ul class="sub-nav d-flex products-option py-3 px-1">
                <li class=" products-li tab-links active-link active-border" onclick="window.tabLinks(this)" id="cards">
                      <button class="btn-pro lg-t-s w-text ">  {{ __('CARDS') }}</button>
                </li>

                <li class=" products-li tab-links "   onclick="window.tabLinks(this)"  id="loans">  <button class="btn-pro lg-t-s w-text">  {{ __('LOANS') }}</button></li>
                <li class=" products-li tab-links "  onclick="window.tabLinks(this)"  id="accounts">  <button class="btn-pro lg-t-s w-text">  {{ __('ACCOUNTS') }}</button></li>
                <li class=" products-li tab-links "   onclick="window.tabLinks(this)"  id="deposit">  <button class="btn-pro lg-t-s w-text">  {{ __('DEPOSIT') }}</button></li>
                <li class=" products-li tab-links "  onclick="window.tabLinks(this)"  id="wealth">  <button class="btn-pro lg-t-s w-text">  {{ __('WEALTH MANAGEMENT') }}</button></li>

            </ul>
        </div>
        <div class="row product-radios my-4" style="background-color: #857d7d">
            <div id="cards-item" class=" tab-contents active-tab" id="cards">
                <div class="swiper swipper4">



                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 my-5 ">
                                    <img src="/img/png/damscus1.jpg" alt="" class="img-cards">
                                </div>
                                <div class="col-lg-6 col-md-12  my-5 ">
                                    <h1>1</h1>
                                    <p>testtesttesttesttesttesttesttesttesttest</p>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 my-5 ">
                                    <img src="/img/png/damscus1.jpg" alt="" class="img-cards">
                                </div>
                                <div class="col-lg-6 col-md-12  my-5 ">
                                    <h1>2</h1>
                                    <p>testtesttesttesttesttesttesttesttesttest</p>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 my-5 ">
                                    <img src="/img/png/damscus1.jpg" alt="" class="img-cards">
                                </div>
                                <div class="col-lg-6 col-md-12  my-5 ">
                                    <h1>3</h1>
                                    <p>testtesttesttesttesttesttesttesttesttest</p>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 my-5 ">
                                    <img src="/img/png/damscus1.jpg" alt="" class="img-cards">
                                </div>
                                <div class="col-lg-6 col-md-12  my-5 ">
                                    <h1>4</h1>
                                    <p>testtesttesttesttesttesttesttesttesttest</p>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 my-5 ">
                                    <img src="/img/png/damscus1.jpg" alt="" class="img-cards">
                                </div>
                                <div class="col-lg-6 col-md-12  my-5 ">
                                    <h1>5</h1>
                                    <p>testtesttesttesttesttesttesttesttesttest</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>


            </div>
            <div id="loans-item" class=" tab-contents" id="loans">
                <ul>
                    <li><span>2019/2020</span><br>at ET company</li>
                    <li><span>2021/2022</span><br>training at ET company</li>
                    <li><span>2018/2020</span><br>training at ET company</li>
                </ul>
            </div>
            <div id="accounts-item" class=" tab-contents" id="accounts">
                <ul>
                    <li><span>2016</span><br>MBA from MIT</li>
                    <li><span>2017</span><br>MBA from MIT</li>
                    <li><span>2018</span><br>MBA from MIT</li>
                </ul>
            </div>
            <div id="deposit-item" class=" tab-contents" id="deposit">
                <ul>
                    <li><span>2016</span><br>MBA from MIT</li>
                    <li><span>2017</span><br>MBA from MIT</li>
                    <li><span>2018</span><br>MBA from MIT</li>
                </ul>
            </div>
            <div id="wealth-item" class=" tab-contents" id="wealth">
                <ul>
                    <li><span>2016</span><br>MBA from MIT</li>
                    <li><span>2017</span><br>MBA from MIT</li>
                    <li><span>2018</span><br>MBA from MIT</li>
                </ul>
            </div>
        </div>

    </div>
</section>



<section class="mb-5" id="besthotels">
    <div class="overflow-sec">
        <div class="row mb-5 pt-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="lg-t blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{ __('BEST Hotels In SYRIA') }}</h1>
            </div>
        </div>
        <div class="mb-5 mx-4 justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <div class="   ">
                <div class="swiper swipper2">



                    <ul class="swiper-wrapper">
                        @foreach ($hotels as $hotel)
                        @if ($hotel->stars >= 4)
                        <li class="swiper-slide">
                            <a href="{{ route('hotels', $hotel->id) }}">
                                <!-- Card -->
                                <div class="card card-sec border-sh hover-card">
                                    <img src="/storage/screens/{{$hotel->logo}}" class="card-img-top card2" alt="" />

                                    <div class="card-body">
                                        <div class="card2-icon">

                                            <span class="t-card w-text">{{$hotel->average_price}}$ </span>
                                        </div>
                                        <div class="des-card">
                                            <h1 class="t-card b-text">{{__($hotel->title)}}</h1>
                                            <div class="border-yellow py-2"></div>
                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/city-solid.svg" alt="Card image cap">
                                            <span class="t-des b-text">{{ __($hotel->cities->title)}}</span>
                                            <br>
                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/landmark-solid.svg" alt="Card image cap">
                                            <span class="t-des b-text">{{ __($hotel->region)}}</span>
                                            <br>

                                            <h3 class="t-card b-text mt-3 text-center">

                                            @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($hotel->stars))
                                            <span>    <img class="card-icon" src="/img/svg/star.svg" alt="stars" /></span>
                                            @else
                                              <span></span>
                                            @endif
                                               @endfor
                                              </h3>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif
                        @endforeach

                    </ul>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ....... -->

    <!-- ...... -->
</section>

<section class="mb-5" id="besthotels">
    <div class="overflow-sec">
        <div class="row mb-5 pt-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="lg-t blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{ __('Cheapest hotels in SYRIA') }}</h1>
            </div>
        </div>
        <div class="mb-5 mx-4 justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <div class="   ">
                <div class="swiper swipper2">



                    <ul class="swiper-wrapper">
                        @foreach ($hotels as $hotel)
                        @if ($hotel->stars <= 2)
                        <li class="swiper-slide">
                            <a href="{{ route('hotels', $hotel->id) }}">
                                <!-- Card -->
                                <div class="card card-sec border-sh hover-card">
                                    <img src="/storage/screens/{{$hotel->logo}}" class="card-img-top card2" alt="" />

                                    <div class="card-body">
                                        <div class="card2-icon">

                                            <span class="t-card w-text">{{$hotel->average_price}}$ </span>
                                        </div>
                                        <div class="des-card">
                                            <h1 class="t-card b-text">{{__($hotel->title)}}</h1>
                                            <div class="border-yellow py-2"></div>
                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/city-solid.svg" alt="Card image cap">
                                            <span class="t-des b-text">{{__($hotel->cities->title)}}</span>
                                            <br>
                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/landmark-solid.svg" alt="Card image cap">
                                            <span class="t-des b-text">{{__($hotel->region)}}</span>
                                            <br>

                                            <h3 class="t-card b-text mt-3 text-center">

                                            @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($hotel->stars))
                                            <span>    <img class="card-icon" src="/img/svg/star.svg" alt="stars" /></span>
                                            @else
                                              <span></span>
                                            @endif
                                               @endfor
                                              </h3>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif
                        @endforeach

                    </ul>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ....... -->

    <!-- ...... -->
</section>




@endsection
