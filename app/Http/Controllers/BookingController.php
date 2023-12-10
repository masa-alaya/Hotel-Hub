<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomBookings;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth    ()->user();
        $room = Room::findOrFail($request->input('room_id'));

        $bookingStartTime = Carbon::parse($request->input('booking_start_time'));
        $bookingEndTime = Carbon::parse($request->input('booking_end_time'));
        $bookingDescription = $request->input('description');

        // Calculate the booking fee
        $bookingFee = $room->price * $bookingStartTime->diffInDays($bookingEndTime);

        // Check if the user has enough balance
        if ($user->balance < $bookingFee) {
            $errorMessage = 'You do not have enough balance to make this booking,Please Charge and try agian';
            return redirect()->back()->with('error', $errorMessage);


         }

        // Check if the room is available for the requested booking period
        $bookedDates = DB::table('room_bookings')
                        ->where('room_id', $room->id)
                        ->whereBetween('booked_date', [$bookingStartTime, $bookingEndTime])
                        ->pluck('booked_date')
                        ->toArray();

        if (!empty($bookedDates)) {
            // The room is already booked for at least one of the requested dates
            return redirect()->back()->with(['error' => 'Sorry, the room is not available for the requested dates.']);
        }

                // Check if the room is available for the requested booking period
                $existingBookings = DB::table('room_bookings')
                                    ->where('room_id', $room->id)
                                    ->where('booked_date', '>=', $bookingStartTime)
                                    ->where('booked_date', '<=', $bookingEndTime)
                                    ->get();

                if ($existingBookings->isNotEmpty()) {
                    // The room is already booked for at least one of the requested dates
                    return redirect()->back()->withErrors(['error' => 'Sorry, the room is not available for the requested dates.']);
                }

        // Deduct the booking fee from the user's balance
        $user->balance -= $bookingFee;
        $user->save();

        // Create the booking record
        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->room_id = $room->id;
        $booking->booking_start_time = $bookingStartTime;
        $booking->booking_end_time = $bookingEndTime;
        $booking->paid = true;
        $booking->confirmed = false;
        $booking->price = $bookingFee;
        $booking->save();

        // Add the booked dates to the room_bookings table
        $bookedDates = collect(CarbonPeriod::create($bookingStartTime, $bookingEndTime)->toArray())
        ->map(function ($date) use ($room) {
            return [
                'room_id' => $room->id,
                'booked_date' => $date->format('Y-m-d'),
            ];
        })
        ->toArray();

    DB::table('room_bookings')->insert($bookedDates);
        return redirect()->route('bookings.show', $booking->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $booking = Booking::findOrFail($id);

        return view('bookings.show', compact('booking'));
    }

    public function create($room_id)
{
    $room = Room::findOrFail($room_id);
    return view('bookings.create', compact('room'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
