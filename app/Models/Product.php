<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;




class Product extends Model
{
    use Searchable {
        Searchable::search as parentSearch;
    }
    use HasFactory;

    // protected $primaryKey = "products.id";


    protected $fillable = [

        'name',
        'description',
        'price',
        'quantity',
        'sole_amount',
        'box_material',
        'box_content',
        'SKU',
        'box_dimension_inner',
        'box_dimension_outer',
        'hasMessage',
        'flower_type',
        'product_image',
        'eachcolor_image'
    ];



    public function toSearchableArray()
    {
        // no need to return values as the database engine only uses the array keys
        return [
            'name' => '', // cat's name
            'price' => '',
            'events.name' => '', // owner's name
        ];
    }

    public static function search($query = '', $callback = null)
    {
        return static::parentSearch($query, $callback)->query(function ($builder) {
            $builder->join('event_product', 'products.id', '=', 'event_product.product_id')

                ->join('events', 'event_product.event_id', 'events.id')
                ->select('products.id as id', 'products.name','products.eachcolor_image', 'events.name as event_name', 'price');
        });
    }


    public function shapes(): BelongsToMany
    {
        return $this->belongsToMany(Shape::class);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'product_material');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'product_image');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
