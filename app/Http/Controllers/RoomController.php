<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Cities;
use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\RoomBookings;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotelId, $roomId)
    {
        $hotel = Hotels::findOrFail($hotelId);
        $rooms = Room::where('hotel_id', $hotelId)
                    ->where('id', $roomId)
                    ->firstOrFail();

        return view('rooms', compact('hotel', 'rooms',));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        $query = Room::query();

        if ($request->has('cities')) {
            $query->whereHas('hotels.cities', function ($q) use ($request) {
                $q->whereIn('id', $request->input('cities'));
            });
        }

        if ($request->has('hotel')) {
            $query->whereHas('hotels', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('hotel') . '%');
            });
        }

        if ($request->has('region')) {
            $query->whereHas('hotels', function ($q) use ($request) {
                $q->where('region', 'like', '%' . $request->input('region') . '%');
            });
        }

        if ($request->has('room')) {
            if ($request->input('room') == 'All') {

            }
            else{
            $query->where('kind', '=', $request->input('room'));}
        }

        if ($request->has('persons') && is_numeric($request->input('persons'))) {
            $query->where('persons', '=', $request->input('persons'));
        }

        if ($request->has('price') && is_numeric(str_replace('$', '', $request->input('price')))) {
            $query->where('price', '<=', str_replace('$', '', $request->input('price')));
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereDoesntHave('room_bookings', function ($q) use ($request) {
                $q->whereBetween('booked_date', [$request->input('start_date'), $request->input('end_date')]);
            });
        }

        $rooms = $query->get();
        $cities = Cities::all();
        return view('search', compact('rooms','cities'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
