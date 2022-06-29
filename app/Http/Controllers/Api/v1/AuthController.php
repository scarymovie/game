<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

//        $validated = $registerRequest->validate();
//        dd($validated);
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
dd($user);
        return $user->createToken('secret')->plainTextToken();;
    }

    public function login(Request $request){
        return 'stas gay';
    }
}
