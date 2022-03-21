<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AuthController extends Controller
{
    /*
    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'S_Activo' => 'required|integer|max:1',
            'verified' => 'required|string'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'S_Activo' => 1,
            'verified' => 'accept'
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    } */

    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => 'required|string|',
            'password' => 'required',
            
        ]);


       if(!Auth::attempt($credentials)){
           return response()->json([
               'message' => "The user credentials were incorrect."
           ], 400);
       }

       $accessToken = Auth::user()->createToken('authToken')->accessToken;

       return response()->json([
           'user' => Auth::user(),
           'access_token' => $accessToken,
       ],200);

              
    }

    public function logout(Request $request)
    {
        

        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }

    

}
