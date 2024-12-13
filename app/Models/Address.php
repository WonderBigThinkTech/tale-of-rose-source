<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address1',
        'address2',
        'country',
        'street', 
        'city',
        'default',
        'company',        
        'postal'
    ];
}
