<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
         'title',
        'description',
        'price',
        'address',
        'area_m2',
        'volume_m3',
        'bedrooms',
        'bathrooms',


       
    ];
}
