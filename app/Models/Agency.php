<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';

    protected $fillable = ['title', 'logo', 'owner_id', 'name', 'email', 'contact', 'address', 'register_by'];

    public function agencyOwner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
