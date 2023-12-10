@extends('layouts.master')
@section('content')

<section class="header-about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-account" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" style="background-image: url('img/png/svu.jpg')">

                </div>
            </div>

        </div>
    </div>
</section>
<section class="about-section my-5">
    <div class="container">

                                    <div class="about-member-pill">
                                        <div class="pill-content">
                                            <P class="lg-t text-center">{{__('A graduation project for the Syrian Virtual University')}}</P>
                                            <p class="lg-t text-center">{{ __('The project represents an electronic application linking hotels located in the Syrian governorates to make it easier for mobile tenants between governorates or those coming from outside the country by securing reservations that suit their requirements') }}</p>

                                        </div>
                                    </div>


    </div>
</section>

<section>
    <div class="tab-pane " id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
        <div class="container">
            <h1 class="text-center">{{__('Supervised by')}}</h1>
            <div class="row p-0 justify-content-center  pb-5">

                <div class="col-lg-6 col-md-6 text-center mb-5">
                    <div class="member-titles mt-4">

                        <p class="light-t">GHADY ALHAMAD</p>
                        <p class="light-t">t_galhamad</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center mb-5">
                    <div class="member-titles mt-4">
                        <p class="light-t">OUMAYMA AL DAKKAK</p>
                        <p class="light-t">t_odakkak</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
<div class="tab-pane " id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
    <div class="container">
        <h1 class="text-center">{{__('Students')}}</h1>
        <div class="row p-0 justify-content-center my-5 pb-5">

            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="member-img-single" style="background-image: url('/img/png/ali.png"></div>
                <div class="member-titles mt-4">

                    <p class="lg-t">ALI ESSA</p>
                    <p class="lg-t">ali-118658</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="member-img-single" style="background-image: url('/img/png/alaa1.png"></div>
                <div class="member-titles mt-4">

                    <p class="lg-t">ALAA KARAM</p>
                    <p class="lg-t">alaa_118613</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="member-img-single" style="background-image: url('/img/png/masa.png"></div>
                <div class="member-titles mt-4">

                    <p class="lg-t">MASA ALAYA</p>
                    <p class="lg-t">masa_112325</p>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
@endsection
