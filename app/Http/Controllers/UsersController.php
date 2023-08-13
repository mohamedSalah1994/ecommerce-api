<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,

        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->verify_code = random_int(10000, 99999);
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                // Send verification code by email
              //  Mail::to($user->email)->send(new VerificationCodeEmail($user->verify_code));

                return response()->json([
                    'status' => 'success',
                    'data' => $user,
                ]);
            } else {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Failed to save user.',
                ],); // Return a status code of 400 (Bad Request) to indicate failure
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => 'An error occurred while saving the user.',
                'error' => $e->getMessage(),
            ],); // Return a status code of 500 (Internal Server Error) for general exceptions
        }
    }


    public function compareVerificationCode(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'failure',
                'message' => 'User not found.',
            ], ); // Return a status code of 404 (Not Found) if user is not found
        }

        if ($user->verify_code == $request->verify_code && $user->email == $request->email) {
             
             $user->user_approve = true;
             
             $user->save();
           
            return response()->json([
                'status' => 'success',
                'message' => 'Verification code is valid.',
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Verification code is invalid.',
            ],); 
        }
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->user_approve) { // Checking if user_approve is true
                // User is approved, return a success response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Logged in successfully.',
                    'user' => $user,
                ]);
            } else {
                // User is not approved, return a failure response
                return response()->json([
                    'status' => 'failure',
                    'message' => 'User not approved.',
                ], ); // Return a status code of 401 (Unauthorized)
            }
        } else {
            // Login credentials are invalid, return a failure response
            return response()->json([
                'status' => 'failure',
                'message' => 'Invalid login credentials.',
            ], ); // Return a status code of 401 (Unauthorized)
        }
    }
    

}
