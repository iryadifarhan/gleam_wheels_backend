<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Booking; 
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\GenericResource;

class BookingController extends Controller
{
    //
    public function store(Request $request) 
    {
        // Start a transaction
        DB::beginTransaction();

        try {
            $place = Place::findOrFail($request->place_id);
            $user = User::findOrFail($request->user_id);
            
            // Find all bookings for the same date
            $lastBooking = $place->bookings()->whereJsonContains('dates', $request->dates[0])->get()->last();
            
            $numberQueue = $lastBooking != null ? $lastBooking->queueNumber + 1 : 1;    //incremental queue
            
            // Create the booking
            $booking = Booking::create([
                'place_id' => $request->place_id,
                'user_id' => $request->user_id,
                'username' => $user->username,
                'service' => $request->service,
                'dates' => $request->dates,
                'queueNumber' => $numberQueue,
                'price' => $request->price,
                'statusFinished' => false
            ]);

            // Update the corresponding Place record
            if (Carbon::parse($request->dates[0])->isToday()) {
                $place->queue += 1; // Update the queue or any other field you want to modify
                $place->save();
            }

            // Commit the transaction if all operations are successful
            DB::commit();

            // Return the response
            return new GenericResource(true, 'Booking Added Successfully', $booking);

        } catch (Exception $e) {
            // Rollback the transaction if there is an error
            DB::rollBack();

            // Return an error response
            return new GenericResource(false, 'Booking Adding failure', null);
        }
    }
}
