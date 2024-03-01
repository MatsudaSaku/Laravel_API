<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->input('user');

        if(! $token = Auth::attempt($credentials)){
            return response()->json(['error'=>'Unauthorized'], 401);
        }

        $user = Auth::user();
        return $this->respondWithToken($token, $user);
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'user' => [
                'email' => $user->email,
                'username' => $user->username,
                'bio' => $user->bio ?? '', 
                'image' => $user->image ?? '', 
                'token' => $token
            ]
        ]);
    }
}
