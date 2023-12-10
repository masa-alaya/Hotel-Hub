<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [

        'hotel_id',
        'logo',
        'description',
        'price',
        'kind'
    ];

public function hotels() {
    return $this->belongsTo(Hotels::class, 'hotel_id');
}



public function bookings()
{
    return $this->hasMany(Booking::class);
}
public function room_bookings()
{
    return $this->hasMany(RoomBookings::class);
}

}
