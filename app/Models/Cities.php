<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    public function hotles() {
        return $this->hasMany(Hotels::class, 'hotel_id');
    }

}






