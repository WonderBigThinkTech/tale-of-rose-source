<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPAddress extends Model
{
    use HasFactory;

    protected $table = 'ip';

    protected $fillable = [
        'ip_address',
        'username',
        'domain_name',
        'os',
        'processor_count'
    ];
}
