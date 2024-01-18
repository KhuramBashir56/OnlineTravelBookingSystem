<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    protected $fillable = ['user_id', 'agency_id', 'place_id', 'title', 'price', 'start', 'end', 'duration', 'slug', 'description'];

    public function place()
    {
        return $this->belongsTo(TourPlace::class, 'place_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function guide()
    {
        return $this->belongsToMany(User::class, 'packages_guides', 'package_id', 'guide_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id', 'id');
    }
}