<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'year',
        'color',
        'plate_number',
        'price_per_day',
        'seats',
        'transmission',
        'fuel_type',
        'description',
        'features',
        'image',
        'is_available',
    ];

    protected $casts = [
        'features' => 'array',
        'is_available' => 'boolean',
        'price_per_day' => 'decimal:2',
    ];

    // Relationships
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/cars/' . $this->image);
        }
        return asset('storage/cars/default.jpg');
    }
}