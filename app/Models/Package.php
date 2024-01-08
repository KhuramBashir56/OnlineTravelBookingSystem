<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = ['user_id', 'agency_id', 'place_id', 'title', 'price', 'start_date', 'end_date', 'slug', 'description'];

    public function place()
    {
        return $this->belongsTo(TourPlace::class, 'place_id', 'id');
    }
}
