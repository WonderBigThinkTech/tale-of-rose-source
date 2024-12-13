<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Color extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function products() : BelongsToMany {
        return $this->belongsToMany(Product::class, 'product_color');
    }

    public function toSearchableArray()
    {
        return ['name' => $this->name];
    }
}
