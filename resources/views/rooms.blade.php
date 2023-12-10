@extends('layouts.master')
@section('content')

<section class="home ">
    <h1 class="lg2-t text-center blue-text" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">{{__($rooms->kind)}}{{__(' Room')}}</h1>
</section>
<section class="home-banner hero-banner">

    <div class="swiper mySwiper" style="    width: 100%;padding-top: 25px;padding-bottom: 50px;">
        <div class="swiper-wrapper">
            @for ($i = 1; isset($rooms->{'image'.$i}); $i++)
                <div class="swiper-slide" style="background-position: center;background-size: cover;width: 60%;height: 400px;">
                    <img src='/storage/screens/{{ $rooms->{'image'.$i} }}' style="border-radius:25px;width:100%;height:100%"/>
                </div>
             @endfor
        </div>
        <div class="swiper-pagination" style="bottom: 12%;"></div>
      </div>

</section>



<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">


    <div class="panel    my-4 " style="display: block;"  >
        <div class="row  my-5  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

            <div class="col-md-6 col-lg-6 " style="text-align:left">
                <div class="row  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                    <div class="col-md-6 col-lg-6">

                        <div class="d-flex">
                            <img class=" icon-overview-2" src="/img/svg/intercom.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{__($rooms->kind)}}{{__(' Room')}}</p>
                        </div>

                    </div>
                </div>
                <div class="row  my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

                    <div class="col-md-6 col-lg-6 align-center">
                        @if ($rooms->persons == 1)

                        <div class="d-flex">
                            <img class=" icon-overview-2" src="/img/svg/user-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{ $rooms->persons }} {{__('person')}}</p>
                        </div>
                        @else
                        <div class="d-flex">
                            <img class=" icon-overview-2" src="/img/svg/user-group-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{ $rooms->persons }} {{__('persons')}}</p>
                        </div>
                        @endif
                    </div>


                </div>
                <div class="row  my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                    <div class="col-md-6 col-lg-6 align-center" >
                        @if ($rooms->kind =='Single')
                        <div class="d-flex" >
                            <img class=" icon-overview-2" src="/img/svg/bed-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('1 single Bed')}}</p>
                        </div>
                        @endif
                        @if ($rooms->kind =='Double')
                        <div class="d-flex">
                            <img class=" icon-overview-2" src="/img/svg/bed-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('1 King bed')}}</p>
                        </div>
                        @endif
                        @if ($rooms->kind =='Family')
                        <div class="d-flex" style="width: 107%">
                            <img class=" icon-overview-2" src="/img/svg/bed-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('1 King bed')}},</p>
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('2 single beds')}}</p>
                        </div>
                        @endif
                        @if ($rooms->kind =='Suite')
                        <div class="d-flex" style="width: 107%">
                            <img class=" icon-overview-2" src="/img/svg/bed-solid.svg" alt="Card image cap">
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('2 King beds,')}}</p>
                            <p class="t-card b-text " style="margin:auto 0%;">{{__('2 single beds')}}</p>
                        </div>
                        @endif

                    </div>

                </div>
           </div>
            <div class="col-md-6 col-lg-6 " style="text-align:left">
                <div class="d-flex">
                    <img class=" icon-overview-2" src="/img/svg/check-solid.svg" alt="Card image cap">
                    <p class="t-card b-text " style="margin:auto 0%;">{{__($rooms->description) }}</p>
                </div>

            </div>
        </div>
        <div class="row  my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <form method="POST" class="row" action="{{ route('bookings.store') }}">
                @csrf
                <input type="hidden" name="room_id" value="{{ $rooms->id }}">
                <div class="col-md-6 col-lg-6 " style="text-align:left">
                    <div class="form-group">

                        <label class="t-card b-text" for="booking_start_time">{{__('Booking Start Time')}}</label>
                        <input type="text" class="form-control" id="booking_start_time" name="booking_start_time" required>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 " style="text-align:left">
                    <div class="form-group">
                        <label class="t-card b-text" for="booking_end_time">{{__('Booking End Time')}}</label>
                        <input type="text" class="form-control" id="booking_end_time" name="booking_end_time" required  min="#booking_start_time">
                    </div>
                </div>
        </div>
        <div class="row  my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
            <div class="col-md-6 col-lg-6 " style="text-align:left">

                <div class="form-group">
                    <label class="t-card b-text" for="description">{{__('Booking Notes')}}</label>
                    <textarea class="form-control" id="description" name="description" rows="3" style="width: 100%" placeholder="{{__('any extra notes for this booking')}}"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 " style="text-align:left">

                <button type="submit" class="btn-book t-card y-text" >{{__('Book Now')}}</button>
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{__(session('error')) }}</div>
                @endif
                @if (session()->has('error2'))
                    <div class="alert alert-danger">{{__(session('error2')) }}</div>
                @endif

            </div>
        </div>

        </form>

    </div>



    </div>
    </div>
    </div>

</section>



@endsection

@section('extra')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });


  </script>
<script>
 $( function() {
       $( "#booking_start_time" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,

        onClose: function( selectedDate ) {
            var selectedDate = $("#booking_start_time").datepicker("getDate");
            var nextDay = new Date(selectedDate.getTime() + (24 * 60 * 60 * 1000));
            $("#booking_end_time").datepicker("option", "minDate", nextDay);
        }
    });
    $( "#booking_end_time" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#fromDate" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
  } );
</script>

@endsection









