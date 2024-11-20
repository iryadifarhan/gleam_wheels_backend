<?php

namespace App\Http\Controllers\Api;

use App\Models\Place;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\GenericResource;

class PlaceController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() 
    {
        // Get all places
        $places = Place::all();

        // Return collection of places as a custom resource
        return new GenericResource(true, 'List Data Places', $places);
    }
    
    public function getBookList($name)
    {
        $bookings = Place::where('name', $name)->firstOrFail()->bookings;
        return new GenericResource(true, 'List Booking from Place', $bookings);
    }
}
