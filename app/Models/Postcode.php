<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Postcode extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['id', 'postcode', 'state', 'locality', 'standard', 'express'];

    public $timestamps = false;

    public function toSearchableArray()
    {
        return [
            'state' => $this->state,
        ];
    }
}
