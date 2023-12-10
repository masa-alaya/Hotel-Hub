
@extends('layouts.master')
@section('content')


<section class="home-banner hero-banner" style="height:60vh">
    <!-- Slider main container -->
    <div class="swiper swiper1">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper" style="height:100%">
            <!-- Slides -->

            @for ($i = 1; isset($city->{'image'.$i}); $i++)

                <div class="swiper-slide js-fullheight" style="">
                    <div class="slide-img" style="background-image: url('/img/png/{{ $city->{'image'.$i} }}'); background-position: center;height:60%">
                        <div class="container h-full">

                        </div>
                    </div>
                </div>

            @endfor
            </div>
        </div>

        <!-- If we need pagination -->
        <div class="home-banner-nav">
            <div class="swiper-pagination nav-progressbar"></div>
        </div>
    </div>

</section>

<section class="sec-section home-roots">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 center-t" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                <div class="text-content">
                    <h1 class="lg-t blue-text"> {{__('About')}} {{__($city->title)}} </h1>
                    <p class="blue-text p-text text-jus">
                        {{__($city->description)}}

                    </p>

                </div>
            </div>
            <!-- <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                <div class="img-flex">
                    <img class="img-third" src="/img/png/third-img2.png" alt="Card image cap" />
                </div>
            </div> -->
        </div>
    </div>
</section>
<section class="mb-5">
    <div class="overflow-sec">
        <div class="row mb-5 pt-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="lg-t blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{ __('City Hotels')}}</h1>
            </div>
        </div>
        <div class="mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <div class="   ">
                <div class="swiper swipper2">



                    <ul class="swiper-wrapper">
                        @foreach ($hotels as $hotel)

                        <li class="swiper-slide">
                            <a href="{{ route('hotels', $hotel->id) }}">
                                <!-- Card -->
                                <div class="card card-sec border-sh hover-card">
                                    <img src="{{ asset('storage/screens/'.$hotel->logo) }}"  class="card-img-top card2" alt="" />

                                    <div class="card-body">
                                        <div class="card-title">

                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/money-bill-1-wave-solid.svg" alt="Card image cap">
                                            <span class="t-card b-text">{{$hotel->average_price}}$ {{__('(AVG)')}}</span>
                                        </div>
                                    <div>
                                    </div>
                                        <div class="des-card">
                                            <h1 class="t-card b-text">{{$hotel->title}}</h1>
                                            <div class="border-yellow py-2"></div>
                                            <img class=" icon-overview" style="width:7%; margin-bottom: 2%;" src="/img/svg/landmark-solid.svg" alt="Card image cap">
                                            <span class="t-card b-text">{{__($hotel->region)}}</span>
                                            <br>

                                            <h3 class="font-md b-text">

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
