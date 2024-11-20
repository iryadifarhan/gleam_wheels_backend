<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'user_id',
        'username',
        'service',
        'dates',
        'queueNumber',
        'price',
        'statusFinished',
    ];

    protected $casts = [
        'dates' => 'array'
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
