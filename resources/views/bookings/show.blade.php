@extends('layouts.master')
@section('content')

<div class="container cont my-5 py-5">
    <div>
        <a href="{{ url()->previous() }}" class="door">
        <img class=" icon-overview-3" src="/img/svg/arrow-right-from-bracket-solid.svg" alt="Card image cap" style="width:4% ">
        </a>
    </div>
<div class="row mb-5">
    <div class="col-md-12 col -lg-12 text-center" >
        <h1 class="a-title">{{__($booking->room->hotels->title)}} , {{__($booking->room->kind)}}{{__(' Room')}}</h1>
    </div>

</div>
<div class="row ">
    <div class="col-md-6 col -lg-6 text-center" >

        <img src="/img/svg/person.svg " class="icon-overview-3 person-book-icon" alt=""  style="margin-left: -10%"><span class="apply-font"> {{Auth::user()->name}}</span>
    </div>
    <div class="col-md-6 col -lg-6 text-center">
        <img src="/img/svg/phone-solid.svg" class="icon-overview-3" alt=""><span class="apply-font"> {{Auth::user()->phone}}</span>
    </div>
</div>
<div class="row ">
    @if (isset($booking->room))

    <div class="col-md-6 col -lg-6 text-center">
        <img class=" icon-overview-3" src="/img/svg/f-solid.svg" alt="Card image cap">
        <span class="apply-font">{{ \Carbon\Carbon::parse($booking->booking_start_time)->format('Y-m-d') }}</span>
    </div>
    <div class="col-md-6 col -lg-6 text-center">
        <img class=" icon-overview-3" src="/img/svg/t-solid.svg" alt="Card image cap">
        <span class="apply-font">{{ \Carbon\Carbon::parse($booking->booking_end_time)->format('Y-m-d') }}</span>
    </div>
</div>
<div class="row ">
    <div class="col-md-6 col -lg-6 text-center">


        <img class=" icon-overview-3" src="/img/svg/comment-regular.svg" alt="Card image cap" style="    margin-left: 6%;">
        <span class="apply-font">{{__($booking->room->description) }}</span>
    </div>

    <div class="col-md-6 col -lg-6 text-center">
        @if(app()->getLocale() === 'ar')


        <img class=" icon-overview-3" src="/img/svg/dollar-b.svg" alt="Card image cap" style="
        margin-left: 17%;">
        <span class="apply-font">
            {{ \Carbon\Carbon::parse($booking->booking_start_time)->diffInDays(\Carbon\Carbon::parse($booking->booking_end_time)) }} {{__('days')}} × {{ $booking->room->price }}
            = {{ $booking->room->price * \Carbon\Carbon::parse($booking->booking_start_time)->diffInDays(\Carbon\Carbon::parse($booking->booking_end_time)) }}$</span>
        @else
        <img class=" icon-overview-3" src="/img/svg/dollar-b.svg" alt="Card image cap" style="
        margin-left: 17%;">
        <span class="apply-font">{{ $booking->room->price }} x
            {{ \Carbon\Carbon::parse($booking->booking_start_time)->diffInDays(\Carbon\Carbon::parse($booking->booking_end_time)) }} days
            = {{ $booking->room->price * \Carbon\Carbon::parse($booking->booking_start_time)->diffInDays(\Carbon\Carbon::parse($booking->booking_end_time)) }}$</span>

            @endif
        </div>
    </div>
    <div class="row text-center">

        @if ($booking->paid)

        <img class=" icon-overview-3" src="/img/svg/circle-check-solid.svg" alt="Card image cap" style="    width: 6%;margin: auto;">
        @else
        <img class=" icon-overview-3" src="/img/svg/circle-xmark-solid.svg" alt="Card image cap" style="    width: 6%;margin: auto;">
            @endif

        @else
            <p>Room not found.</p>
        @endif
</div>
</div>
@endsection
