<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Booking;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'rating',
        'features',
        'img_source',
        'pricing',
        'queue',
        'capacity',
        'range',
    ];

    protected $casts = [
        'features' => 'array',
    ];
    
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * image
     *
     * @return Attribute
     */
    protected function imgSource(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('https://iryadifarhan.github.io/gleam_wheels/assetsImg/places' . $value),
        );
    }

}
