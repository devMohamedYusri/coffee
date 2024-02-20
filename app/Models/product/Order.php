<?php

namespace App\Models\product;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'last_name',
        'zipcode',
        'country',
        'city',
        'street_address',
        'apartment_suite_etc',
        'phone',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
