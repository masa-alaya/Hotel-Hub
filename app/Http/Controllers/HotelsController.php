<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Cities;
use App\Models\Room;
use App\Models\Offers;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function showHomePage(){
        $hotels = collect();
        $offers= Offers::limit(10)->get();

      //  get the best seller meals
      //  $best_hotels = Hotels::selectRaw('hotel_id, count(hotel_id) as total')->groupBy('hotel_id')->orderBy('total', 'desc')->limit(10)->get();

        $best_hotels = Hotels::limit(10)->get();

        // looping through best seller meals ids and fetching the meal data
        // foreach($best_hotels as $meal) {
        //     $meals->push(Meal::find($meal->meal_id));
        // }
        foreach($best_hotels as $hotel) {
            $hotels->push(Hotels::find($hotel->id));
        }

        // getting all the categories
        $cities = Cities::all();
        // redirecting the the web page
        return view('welcome')->with([
            'hotels' => $hotels,
            'cities' => $cities,
            'offers'=>$offers,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotelId)
    {
        $hotel = Hotels::findOrFail($hotelId);
        $rooms = Room::where('hotel_id', $hotelId)->get();

        return view('hotel', compact('hotel','rooms'));
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
     * @param  \App\Models\Hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function show(Hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotels $hotels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotels $hotels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotels $hotels)
    {
        //
    }
}
