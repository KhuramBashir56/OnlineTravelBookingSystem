<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPlace extends Model
{
    use HasFactory;

    protected $table = 'tour_places';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function agencyOwner()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(PlaceComment::class, 'place_id', 'id');
    }
}
