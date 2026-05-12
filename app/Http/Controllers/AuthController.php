<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        if ($login){
            return response()->json($request->user()->createToken('auth_token')->plainTextToken, 200);    
        }
        else{
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        }
}
