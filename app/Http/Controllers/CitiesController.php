<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CitiesController extends Controller
{

    public function showHotels($cityId)
{
    $city = Cities::findOrFail($cityId);
    $hotels = Hotels::where('city_id', $cityId)->get();
    return view('cities.hotels', compact('city', 'hotels'));
}
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
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(Cities $cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function edit(Cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cities $cities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cities $cities)
    {
        //
    }

    public function contactEmail(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'subject' => $request->subject,
            'msg' => $request->msg,
            'howContact' => $request->howContact,
        );

        $emails = ['ali6721985@gmail.com', $request->email];

        Mail::send('emails.contact', $data, function($message) use ($emails) {
            $message->to($emails)->subject('Contact US');
        });

        return "Thank you for contacting us";
    }
}
