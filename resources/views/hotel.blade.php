@extends('layouts.master')
@section('content')


<section class="home">
    <h1 class="lg2-t text-center blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{ $hotel->title}}</h1>
</section>
<section class="home-banner hero-banner"  style="height:60vh">
    <!-- Slider main container -->
    <div class="swiper swiper1">
        <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                @for ($i = 1; isset($hotel->{'image'.$i}); $i++)

                <div class="swiper-slide js-fullheight" style="">
                    <div class="slide-img" style="background-image: url('/storage/screens/{{ $hotel->{'image'.$i} }}');">
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

<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">

    <button class="accordion active">
    <div  class="d-flex">
            <img class="arrow-icon-up" src="/img/svg/arrow-up.svg" alt="Card image cap">

            <h2 class="a-title2 blue-text ">{{ __('Informations') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 " style="display: block;"  >

    <div class="row text-center my-4  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

        <div class="col-md-6 col-lg-6">
            <div class="row text-center my-4  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                <div class="col-md-6 col-lg-6">

                    <div class="d-flex">
                        <img class=" icon-overview-2" src="/img/svg/city-solid.svg" alt="Card image cap">
                        <p class="t-card b-text " style="margin:auto 0%;">{{__($hotel->cities->title)}}</p>
                    </div>

                </div>

            </div>
            <div class="row text-center my-4  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                <div class="col-md-6 col-lg-6 " style="text-align:left">
                    <div class="d-flex">
                        <img class=" icon-overview-2" src="/img/svg/landmark-solid.svg" alt="Card image cap">
                        <p class="t-card b-text " style="margin:auto 0%;">{{__($hotel->region)}} {{__('region')}}</p>
                    </div>

                </div>
            </div>
            <div class="row text-center my-4  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

                <div class="col-md-6 col-lg-6 " style="text-align:left">
                    <div class="d-flex">
                        <img class=" icon-overview-2" src="/img/svg/street-view-solid.svg" alt="Card image cap">
                        <p class="t-card b-text " style="margin:auto 0%;">{{__($hotel->street)}} {{__('street')}}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 align-center">

            @for ($i = 1; $i <= 5; $i++)
            @if ($i <= round($hotel->stars))
            <span>    <img class="icon-acount3" src="/img/svg/star.svg" alt="stars" /></span>
            @else
              <span></span>
            @endif
               @endfor

               <p class="my-4 t-card y-text">{{__('Average prices')}}</p>
               <p class="my-4 t-card y-text">{{$hotel->average_price}}$</p>
        </div>

    </div>

    </div>



    </div>
    </div>
    </div>

</section>

<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">

    <button class="accordion   ">
    <div  class="d-flex">
            <img class="arrow-icon-up" src="/img/svg/arrow-up.svg" alt="Card image cap">

            <h2 class="a-title2 blue-text ">{{ __('Popular amenities') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 " style="display: none;"  >
            <div class="row text-center my-5  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                @if ($hotel->stars == 5 )
                    <div class="col-md-3    ">
                        <div class="ac-content">
                                            <img class=" icon-acount2" src="/img/svg/person-swimming-solid.svg" alt="Card image cap">
                                            <p class="light-t-s b-text scale-9" >{{ __('Pool') }}</p>
                        </div>

                    </div>

                    <div class="col-md-3    ">
                        <div class="ac-content">
                                            <img class=" icon-acount2" src="/img/svg/circle-dollar-to-slot-solid.svg" alt="Card image cap">
                                            <p class="light-t-s b-text scale-9" >{{ __('Casino') }}</p>
                        </div>

                    </div>

                    <div class="col-md-3    ">
                        <div class="ac-content">
                                            <img class=" icon-acount2" src="/img/svg/dumbbell-solid.svg" alt="Card image cap">
                                            <p class="light-t-s b-text scale-9" >{{ __('GYM') }}</p>
                        </div>

                    </div>
                    <div class="col-md-3    ">
                        <div class="ac-content">
                                            <img class=" icon-acount2" src="/img/svg/puzzle-piece-solid.svg" alt="Card image cap">
                                            <p class="light-t-s b-text scale-9" >{{ __('Child-friendly activities') }}</p>
                        </div>

                    </div>


                @endif
                @if ($hotel->stars  >= 4 )
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/door-open-solid.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Connecting rooms available') }}</p>
                            </div>

                    </div>
                @endif
                @if ($hotel->stars  >= 3 )
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/wind-solid.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Air conditioning') }}</p>
                            </div>

                    </div>
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/utensils-solid.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Restaurant') }}</p>
                            </div>

                    </div>
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/bar.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Bar') }}</p>
                            </div>

                    </div>
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/calendar-check-regular.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('24/7 front desk') }}</p>
                            </div>

                    </div>
                @endif
                @if ($hotel->stars  >= 1 )
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/parking.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Parking available') }}</p>
                            </div>

                    </div>
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/wifi-solid.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Free WiFi') }}</p>
                            </div>

                    </div>
                    <div class="col-md-3    ">
                            <div class="ac-content">
                                                <img class=" icon-acount2" src="/img/svg/glass-water-solid.svg" alt="Card image cap">
                                                <p class="light-t-s b-text scale-9" >{{ __('Laundry facilities') }}</p>
                            </div>

                    </div>

                @endif
                @if ($hotel->stars  == 2 ||$hotel->stars  == 1 )
                    <div class="col-md-3    ">
                        <div class="ac-content">
                                            <img class=" icon-acount2" src="/img/svg/currency.svg" alt="Card image cap">
                                            <p class="light-t-s b-text scale-9" >{{ __('Non-smoking') }}</p>
                        </div>
                @endif
            </div>

            </div>




            </div>
    </div>



    </div>
    </div>
    </div>




</section>

<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">

    <button class="accordion ">
    <div  class="d-flex">
            <img class="arrow-icon-up" src="/img/svg/arrow-up.svg" alt="Card image cap">

            <h2 class="a-title2 blue-text ">{{ __('About this area') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 " style="display: none;"  >
            <div class="row text-center my-5  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                <div class="col-md-6 col-lg-6">

                            <div class="col-md-6 col-lg-6 " style="text-align:left">
                                <div class="d-flex">
                                    <img class=" icon-overview" src="/img/svg/location-dot-solid.svg" alt="Card image cap">
                                    <p class="light-t b-text " style="margin:auto 0%;">{{ __('What is nearby') }}</p>
                                </div>
                                <ul class="nearby light-t-2 b-text" >
                                    <div class="div-nearby">

                                    <li>{{$hotel->nearby1}}</li>
                                    <li>{{$hotel->nearby2}}</li>
                                    <li>{{$hotel->nearby3}}</li>
                                    <li>{{$hotel->nearby4}}</li>

                                    </div>
                                </ul>
                            </div>
                            <br>
                            <br>

                            <div class="col-md-6 col-lg-6 " style="text-align:left">
                                <div class="d-flex">
                                    <img class=" icon-overview" src="/img/svg/utensils-solid.svg" alt="Card image cap">
                                    <p class="light-t b-text " style="margin:auto 0%;">{{ __('Nearby restaurants') }}</p>
                                </div>
                                <ul class="nearby light-t-2 b-text" style="width: 80%;">
                                    <li>{{$hotel->restaurant1}}</li>
                                    <li>{{$hotel->restaurant2}}</li>
                                    <li>{{$hotel->restaurant3}}</li>
                                    <li>{{$hotel->restaurant4}}</li>


                                </ul>

                            </div>
                </div>


                <div class="col-md-6 col-lg-6">
                        <div class="">
                            @if ($hotel->cities->title == 'Damasscus')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106456.3562002661!2d36.2004940525971!3d33.507591365518756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e6dc413cc6a7%3A0x6b9f66ebd1e394f2!2sDamascus%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441445560!5m2!1sen!2sus" width="500" height="400"style="border:1; border-radius: 5%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @endif
                            @if ($hotel->cities->title == 'Lattakia')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d415415.9999413415!2d35.67134659063423!3d35.56759194919812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15241c8bc2bf561f%3A0xdbb2edac5c45c32b!2sLatakia%20Governorate%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441471941!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Aleppo')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103019.38695403443!2d37.06618381944048!3d36.20654492671744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152ff813b98135af%3A0x967e5e5fc542c32a!2sAleppo%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441496141!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Homs')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d148392.15520969138!2d36.48644388707453!3d34.72952851084395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15230e9047c7c0fb%3A0xac367e06303788d0!2zSG9tc-KAjiwgU3lyaWE!5e0!3m2!1sen!2sus!4v1689441533938!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Ar Raqqah')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51674.88339344792!2d38.95588776173125!3d35.95479208963727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x153719cb01b7b5fb%3A0xc8bdaf18cf35cfe3!2sAr%20Raqqah%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441550219!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Tartus')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52364.98850088296!2d35.8414913001723!3d34.886072408213515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15217e77890fb9a3%3A0xa072a491096e24b!2zVGFydHVz4oCOLCBTeXJpYQ!5e0!3m2!1sen!2sus!4v1689441570739!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Deir ez-Zur')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52077.18820515412!2d40.09677610498859!3d35.33518523195264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154817f4aeddb761%3A0x4cbc9d58e981374f!2sDeir%20ez-Zur%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441595306!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Qamishli')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50949.64169598683!2d41.163487764530984!3d37.04907966699281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400a0579690ce791%3A0xcc7364779b0bff3f!2sQamishli%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441608594!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Hama')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52204.74376222954!2d36.709209252853206!3d35.136751920609846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1524828fcdd5b865%3A0x62d43f56ee62b5ef!2sHama%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441632842!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Idlib')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25846.64213702317!2d36.61496879522934!3d35.92665439245335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152508664354cbdf%3A0xc44836a7b49c636f!2sIdlib%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441645849!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Daraa')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53765.949822263334!2d36.0582500768215!3d32.622919265685496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151beddbe3fad6e5%3A0x627d4c644d6a0576!2sDaraa%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441662203!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'As Suwayda')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53718.43907771613!2d36.49839943228316!3d32.701932230843184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151bd56f8dade971%3A0x208cd813f56c273a!2sAs%20Suwayda%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441678292!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Al-Hasakah')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51312.87553664572!2d40.70234776780812!3d36.50454116005438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154ba8cd8c29a889%3A0x386be4546d7c857b!2sAl%20Hasakah%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441704750!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Quneitra')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26731.40463401976!2d35.809312037899886!3d33.124182296800186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151eb2036917838f%3A0x5ee38f9e4e7c6cae!2sAl%20Qunaitra!5e0!3m2!1sen!2sus!4v1689441719009!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                            @if ($hotel->cities->title == 'Rural Damascus')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d852239.1035733939!2d36.4063112740903!3d33.44776940412763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151817d18055d5b3%3A0xed57506c25461bd0!2sRif-Dimashq%20Governorate%2C%20Syria!5e0!3m2!1sen!2sus!4v1689441736897!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            @endif
                        </div>

                </div>


            </div>
    </div>



    </div>
    </div>
    </div>




</section>

<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">

    <button class="accordion ">
    <div  class="d-flex">
            <img class="arrow-icon-up" src="/img/svg/arrow-up.svg" alt="Card image cap">

            <h2 class="a-title2 blue-text ">{{ __('Description') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 " style="display: none;"  >
            <div class="row my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                <div class="col-md-8 col-lg-8 mx-5">

                   <p class="t-card b-text ">{{__($hotel->description)}}</p>
                </div>
            </div>
    </div>



    </div>
    </div>
    </div>




</section>


<section class="mb-5">
    <div class="overflow-sec">
        <div class="row mb-5 pt-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="a-title2 blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500"> {{__('Rooms')}}</h1>
            </div>
        </div>
        <div class="mb-5 mx-5 justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <div class="   ">
                <div class="swiper swipper2">



                    <ul class="swiper-wrapper">
                        @foreach ($rooms as $room)

                        <li class="swiper-slide">
                            <a href="{{ route('rooms.index', ['hotel' => $hotel->id,'room' => $room->id]) }}">
                                <!-- Card -->
                                <div class="card card-sec border-sh hover-card">
                                    <img src="/storage/screens/{{$room->logo}}" class="card-img-top card2" alt="" />

                                    <div class="card-body">
                                        <div class="card-title">
                                            <img class="card2-icon" src="/img/svg/sec-1.svg" alt="Card image cap" />
                                        </div>
                                        <div class="des-card">
                                            <h1 class="t-card b-text">{{__($room->kind)}}{{__(' Room')}}</h1>
                                            <div class="border-yellow py-2"> </div>
                                            <h3 class="font-md b-text">{{__('price:')}}</span> {{round($room->price)}} S.P</h3>
                                            <h3 class="font-md b-text">
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








