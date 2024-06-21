<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request)
    {
        # Check request data
        $registerUserData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|',

        ]);

        # Create user
        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'password' => Hash::make($registerUserData['password']),

        ]);

        # Log user
        $token = $user->createToken('auth_token')->plainTextToken;;

        # Return response
//        return response()->json([
//            'message' => 'User Created',
//            'user' => $user,
//            'access_token' => $token,
//        ]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'User Created',
        ]);
    }

    public function login(Request $request)
    {
        # Check user
        $user = User::where('email', $request['email']);
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }


        # Log user
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

        # Return response
        return response()->json([
            'message' => 'Logged in',
            'user' => $user,
            'access_token' => $token,
        ]);
    }
//    public function login(Request $request)
//    {
//        if (!Auth::attempt($request->only('email', 'password'))) {
//            return response()->json([
//                'message' => 'Invalid login details'
//            ], 401);
//        }
//
//        $user = User::where('email', $request['email'])->firstOrFail();
//
//        $token = $user->createToken('auth_token')->plainTextToken;
//
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'Bearer',
//        ]);
//    }


    public function logout(Request $request)
    {
        # Delete user tokens
        $request->user()->tokens()->delete();

        # Return response
        return response()->json([
            'message' => 'logged out'
        ]);
    }
}
