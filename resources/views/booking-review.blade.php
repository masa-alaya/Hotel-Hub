@extends('layouts.master')
@section('content')


<section class=" my-4">
    <div class="container">
    <div class="row  home-page-text "data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">

    <div class="col-md-12 border-b">


            <h2 class="a-title2 blue-text ">{{ __('Personal Information') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 "   >
            <div class="row my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                <form method="POST" action="{{ route('update') }}">
                    @csrf


                    <!-- Name -->
                    <div class="form-outline mb-2" >
                        <x-label class="blue-text" for="name" class="blue-text" :value="__('Full Name')" />

                        <x-input id="name" class="form-control form-control-lg" type="text" name="name" value="  {{Auth::user()->name}}" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="form-outline mb-2">
                        <x-label class="blue-text" for="email" :value="__('Email')" />

                        <x-input id="email" class="form-control form-control-lg" type="email" name="email" value="  {{Auth::user()->email}}" required />
                    </div>

                    <!-- Phone Number -->
                    <div class="form-outline mb-2">
                        <x-label class="blue-text" for="phone" :value="__('Phone')" />

                        <x-input id="phone" class="form-control form-control-lg" type="tel" name="phone" value="  {{Auth::user()->phone}}" required x-data x-mask="9999 999 999"/>
                    </div>

                    <!-- Password -->
                       <div class="form-outline mb-2">
                        <x-label class="blue-text" for="password" :value="__('Password')" />

                        <x-input id="password" class="form-control form-control-lg"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password"
                                        />
                    </div>

                    <!-- Confirm Password -->
                       <div class="form-outline mb-2">
                        <x-label class="blue-text" for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="form-control form-control-lg"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-between mt-4">


                        <x-auth-validation-errors class="mb-2" :errors="$errors"  style="color: #ff6219"/>

                        <x-button class="btn  btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                            Update
                        </x-button>
                    </div>

                </form>



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

            <h2 class="a-title2 blue-text ">{{ __('Reservations details') }}
    </h2>

    </div>
    </button>
    <div class="panel    my-4 " style="display: none;"  >
            <div class="row my-3  " data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">


                <div class="col-md-12 col-lg-12 ">
                    <table class="table table-striped">
                        <tr>
                        <th class="lg-t  b-text">City</th>
                        <th class="lg-t  b-text">Hotel</th>
                        <th class="lg-t  b-text">Room Kind</th>
                        <th class="lg-t  b-text">Start Time</th>
                        <th class="lg-t  b-text">End Time</th>
                        <th class="lg-t  b-text">Link</th>
                        </tr>
                        @foreach($userBookings as $userBooking)
                        <tr>

                            <td class="t-card b-text">{{$userBooking->room->hotels->cities->title}}</td>
                            <td class="t-card b-text">{{$userBooking->room->hotels->title}}</td>
                            <td class="t-card b-text">{{$userBooking->room->kind}}</td>
                            <td class="t-card b-text">{{date('y-m-d', strtotime($userBooking->booking_start_time))}}</td>
                            <td class="t-card b-text">{{date('y-m-d', strtotime($userBooking->booking_end_time))}}</td>
                            <td class="t-card b-text"><a href="{{route('hotels',$userBooking->room->hotels->id)}}" target="blank">        <img class=" icon-overview-3" src="/img/svg/arrow-right-from-bracket-solid.svg" alt="Card image cap" style="width:45% ">
                            </a></td>
                        </tr>
                        @endforeach
                    </table>


                </div>
            </div>
    </div>



    </div>
    </div>
    </div>




</section>




@endsection


