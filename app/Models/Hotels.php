<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'cit_id',
        'logo',
        'stars',
        'description',
        'address'
    ];

public function cities() {
    return $this->belongsTo(Cities::class, 'city_id');
}
public function rooms() {
    return $this->hasMany(Room::class, 'room_id');
}
}
