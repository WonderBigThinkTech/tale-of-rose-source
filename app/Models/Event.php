<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use Searchable;
    use HasFactory;



    protected $fillable = [
        'name',
        'event_group',
        'image'
    ];


    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}