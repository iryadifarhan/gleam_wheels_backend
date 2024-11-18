<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\GenericResource;

class UserController extends Controller
{
    /**
     * Store a newly registered user in the database.
     */
    public function store(Request $request)
    {

        // Create the user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'token' => Hash::make($request->email)
        ]);

        return new GenericResource(true, 'User Register Successful', $user);
    }

    /**
     * Display the specified user by email.
     */
    public function login(Request $request)
    {
        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return new GenericResource(false, 'Email is not yet registered', '');
        }

        // Check if the provided password matches the stored hashed password
        if (!Hash::check($request->password, $user->password)) {
            return new GenericResource(false, 'Password is incorrect', '');
        }

        return new GenericResource(true, 'User Login Successful', $user);
    }

    public function autologin(Request $request) {
        $bearerToken = $request->bearerToken();

        $user = User::where('token', $bearerToken)->first();

        if($user) {
            return new GenericResource(true, 'Autologin Successful', $user);
        }
        return new GenericResource(false, 'Autologin Unsuccessful', "");
    }
}
