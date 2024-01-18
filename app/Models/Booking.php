<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $table = 'bookings';

    protected $fillable = ['package_id', 'user_id', 'persons', 'total_amount', 'bank_name', 'account_title', 'transaction_id', 'claim_amount'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}