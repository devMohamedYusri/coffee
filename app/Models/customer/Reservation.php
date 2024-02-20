<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'date',
        'time',
        'message',
        'status',
    ];
}
