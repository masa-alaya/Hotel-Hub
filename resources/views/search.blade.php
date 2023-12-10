@extends('layouts.master')
@section('content')

    <div class="container">


        <form method="GET" action="{{ route('advancedSearch') }}">
            <div class="row">

                <div class="col-md-3 col-lg-3 col-sm-3 my-5">
                    <div class="row mb-2">
                        <div class="form-group ">
                            <label class="t-card" for="cities">{{__('Cities')}}</label>
                            <div>
                                @foreach( $cities as $city)
                                    <div>
                                        <input type="checkbox" name="cities[]" value="{{ $city->id }}" @if(in_array($city->id, Request::get('cities', []))) checked @endif>
                                        <label>{{__($city->title) }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="border-yellow-2 my-3"></div>


                    <div class="row mb-2">
                        <div class="form-group ">
                            <label class="t-card"  for="hotel">{{__('Hotel')}}</label>
                            <input placeholder="{{__('Optional')}}" type="text" class="form-control w-80" id="hotel" name="hotel" value="{{ Request::get('hotel') }}">
                        </div>
                    </div>
                    <div class="border-yellow-2 my-3"></div>
                    <div class="row mb-2">
                        <div class="form-group">
                            <label class="t-card" for="region">{{__('Region')}}</label>
                            <input placeholder="{{__('Optional')}}" type="text" class="form-control w-80" id="region" name="region" value="{{ Request::get('region') }}">
                        </div>
                    </div>
                    <div class="border-yellow-2 my-3"></div>
                    <div class="row mb-2">
                        <div class="form-group">
                            <label class="t-card" for="room">{{__('Room Kind')}}</label>
                            <select class="form-control w-80" id="room" name="room">
                                <option value="All" {{ Request::get('room') == 'All' ? 'selected' : '' }}>{{__('All')}}</option>
                                <option value="Single" {{ Request::get('room') == 'Single' ? 'selected' : '' }}>{{__('Single')}}</option>
                                <option value="Double" {{ Request::get('room') == 'Double' ? 'selected' : '' }}>{{__('Double')}}</option>
                                <option value="Family" {{ Request::get('room') == 'Family' ? 'selected' : '' }}>{{__('Family')}}</option>
                                <option value="Suite" {{ Request::get('room') == 'Suite' ? 'selected' : '' }}>{{__('Suite')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="border-yellow-2 my-3"></div>

                    <div class="row mb-2">
                        <div class="form-group">
                            <label class="t-card" for="region">{{__('Persons')}}</label>
                            <input placeholder="{{__('Optional')}}" type="number" class="form-control w-80" id="persons" name="persons" value="{{ Request::get('persons') }}">
                        </div>
                    </div>
                    <div class="border-yellow-2 my-3"></div>
                    <div class="row">
                        <div class="form-group">
                            <label class="t-card" for="price">{{__('Price')}}</label>
                            <div class="d-flex align-items-center">
                                <span class="ml-2"  id="price-value">{{ Request::get('price') }}$</span>
                                <input type="range" class="form-control-range" id="price" name="price" min="0" max="1000" step="10" value="{{ Request::get('price') }}">
                                <span class="mr-2">1000$</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-lg-9 col-sm-9">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="start_date">{{__('Start Date')}}</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ Request::get('start_date') }}">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="end_date">{{__('End Date')}}</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ Request::get('end_date') }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-4">{{__('Search')}}</button>


                            </div>
                        </div>
                    </div>
                    @if ($rooms->count() > 0)
                        <div class="row my-5 px-4">
                            @foreach ($rooms as $room)
                                <div class="row my-4 card-room ">
                                    <div class="col-md-7  pt-4 pb-2">
                                            <h3 class="card-title y-text">{{__($room->hotels->title)}}</h3>
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/city-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">  {{__($room->hotels->cities->title)}}</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/landmark-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">  {{__($room->hotels->region)}}</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/street-view-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">  {{__($room->hotels->street)}}</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/intercom.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;"> {{__($room->kind)}} </p>
                                            </div>

                                            @if ($room->persons <= 1)

                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/user-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{ $room->persons }} {{__('person')}}</p>
                                            </div>
                                            @else
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/user-group-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{ $room->persons }}{{__('persons')}}</p>
                                            </div>
                                            @endif
                                            @if ($room->kind =='Single')
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/bed-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('1 single Bed')}}</p>
                                            </div>
                                            @endif
                                            @if ($room->kind =='Double')
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/bed-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('1 King bed')}}</p>
                                            </div>
                                            @endif
                                            @if ($room->kind =='Family')
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/bed-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('1 King beds')}},</p>
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('2 single beds')}}</p>
                                            </div>
                                            @endif
                                            @if ($room->kind =='Suite')
                                            <div class="d-flex mb-2">
                                                <img class=" icon-overview-4" src="/img/svg/bed-solid.svg" alt="Card image cap">
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('2 King beds')}},</p>
                                                <p class="t-card b-text " style="margin:auto 0%;">{{__('2 single beds')}}</p>
                                            </div>
                                            @endif
                                            @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($room->hotels->stars))
                                            <span>    <img class="icon-overview-5" src="/img/svg/star.svg" alt="stars" /></span>
                                            @else
                                              <span></span>
                                            @endif
                                            @endfor
                                            <div class=" btn btn-warning btn-price" style="position: relative;left:35%">

                                                <span class="t-card w-text"> {{ $room->price }}$</span>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="btn btn-light ">

                                              <a class="t-card y-text" href="{{ route('rooms.index', ['hotel' =>  $room->hotels->id,'room' => $room->id]) }}">{{__('Booking')}}</a>
                                            </div>


                                    </div>

                                    <div class=" img-search col-md-5 ">
                                            <img src="/storage/screens/{{ $room->logo }}" alt="" class="d-block img-card">
                                    </div>

                                </div>

                            @endforeach
                        </div>
                    @else
                    <div class="text-center" style="margin: auto">
                        <p class="a-title2 b-text my-5">{{__(' No room found.')}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </form>

        <hr>


    </div>
@endsection
@section('extra')

<script>
    const priceRangeInput = document.getElementById('price');
    const priceValue = document.getElementById('price-value');

    priceRangeInput.addEventListener('input', function() {
        priceValue.textContent = priceRangeInput.value + '$';
    });
</script>

@endsection
