<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageComment extends Model
{
    use HasFactory;

    public $table = 'package_comments';

    protected $fillable = ['name', 'email', 'comment', 'package_id'];

}
