<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        
        $credentials = $request->all();
        
        $validator=Validator::make($request->all(),['email' => 'required|email|exists:App\User,email']);
       
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }
        Password::sendResetLink($credentials);

        return response()->json(['message' => 'Reset password link sent on your email']);
    }



    public function resetPassword(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|',
        ];

        $credentials = $request->all();
        $validator = Validator::make($credentials,$rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }


        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["message" => "Invalid token provided"], 400);
        }

        return response()->json(["message" => "Password has been successfully changed"]);
    }
}
