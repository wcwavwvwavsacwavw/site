<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'recipient_name',
        'recipient_email',
        'expiry_date',
        'used',
    ];
public function bookings()
{
    return $this->hasMany(Booking::class); 
}

}
