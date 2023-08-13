<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'failure',
                'message' => 'User not found.',
            ]); // Return a status code of 404 (Not Found) if user is not found
        }

        // Generate verification code
        $verify_code = mt_rand(10000, 99999);

        // Save the verification code to the user's record
        $user->verify_code = $verify_code;
        $user->save();

        // Send verification code via email
        //  Mail::to($user->email)->send(new VerificationCodeEmail($user->verify_code));

        return response()->json([
            'status' => 'success',
            'message' => 'Verification code sent to your email.',
        ]);
    }

    public function checkVerificationCode(Request $request)
    {


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'failure',
                'message' => 'User not found.',
            ],); // Return a status code of 404 (Not Found) if user is not found
        }

        if ($user->verify_code == $request->verify_code) {
            return response()->json([
                'status' => 'success',
                'message' => 'Verification code is valid.',
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Verification code is invalid.',
            ],); // Return a status code of 400 (Bad Request) if verification code is invalid
        }
    }

    public function resetPassword(Request $request)
    {


        $user = User::where('email', $request->email)->first();


        if ($request->password == $request->password_confirmation) {
            // Reset the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Password reset successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Password confirmation does not match.',
            ],);
        }
    }
}
