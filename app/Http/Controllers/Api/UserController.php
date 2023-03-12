<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){

        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('myapptoken')->plainTextToken;

            return response()->json($token);
        }

        return response()->json('El usuario y/o contraseña es incorrecto');
    }

    public function logout(Request $request){
        // $user = Auth::user();

        // $user->tokens()->delete();
        return response()->json('logout');
    }

}
