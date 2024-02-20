<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'price',
        'image',
        'category_id',
    ];
    public function belongs() {
        return $this->belongsTo(Category::class,'category_id');
    }
    // public function order()
    // {
    //     return $this->hasMany(order::class);
    // }
}
