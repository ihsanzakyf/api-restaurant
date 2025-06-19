<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password,  $user->password)) {

            return response()->json([
                'message'   => 'Invalid Username Or Password',
                'status'    => 0
            ], 401);
        }

        $token = $user->createToken($user->name);
    
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }    
}
