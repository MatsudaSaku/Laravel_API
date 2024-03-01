<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // リクエストデータのバリデーション
        $validatedData = $request->validate([
            'user.username' => 'required|string|max:255',
            'user.email' => 'required|string|email|max:255|unique:users,email',
            'user.password' => 'required|string|min:8',
        ]);

        // ユーザーの作成
        $user = User::create([
            'username' => $validatedData['user']['username'],
            'email' => $validatedData['user']['email'],
            'password' => Hash::make($validatedData['user']['password']),
        ]);

        // 作成したユーザーをレスポンスとして返す
        return response()->json(['user' => $user], 201);
    }

    public function home(){
        return view('conduit.home');
    }
}