<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesGuides extends Model
{
    use HasFactory;

    public $table = 'packages_guides';

    public $fillable = ['package_id', 'guide_id', 'agency_id'];
}
