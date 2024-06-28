<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


/**
 * @OA\Info(title="My API", version="1.0")
 */
class AuthController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/user",
     *     @OA\Response(response="200", description="Get current user")
     * )
     */
    public function user(Request $request)
    {
        return $request->user();
    }

    /**
     * @OA\Post(
     *     path="/api/register",
     *     @OA\Response(response="200", description="Register a new user"),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"name": "John Doe", "email": "john@example.com", "password": "password123"}
     *             )
     *         )
     *     )
     * )
     */
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
    /**
     * @OA\Post(
     *     path="/api/login",
     *     @OA\Response(response="200", description="Log in a user"),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "john@example.com", "password": "password123"}
     *             )
     *         )
     *     )
     * )
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

//        # Check user
//        $user = User::where('email', $request['email']);
//        $user = User::where('email', $request['email'])->first();
//
//        if (!$user || !Hash::check($request['password'], $user->password)) {
//            return response()->json([
//
//                'message' => 'Invalid Credentials',
//                'Hash' => Hash::make($request['password']),
//                'email' => $request['email'],
//                'password' => $request['password']
//
//            ], 401);
//        }
//
//        # Check user
//        $query = User::where('email', $request['email']);
//
//        if ($query->exists()) {
//            $user = $query->first();
//        } else {
//            // Handle the case where no user was found
//            return response()->json([
//                'message' => 'No user found with the provided email'
//            ], 404);
//        }
//
//        if (!Hash::check($request['password'], $user->password)) {
//            return response()->json([
//                'message' => 'Invalid Credentials',
//                'Hash' => Hash::make($request['password']),
//                'email' => $request['email'],
//                'password' => $request['password']
//            ], 401);
//        }
        # Log user
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

        # Return response
        return response()->json([
            'message' => 'Logged in',
            'user' => $user,
            'access_token' => $token,
        ]);
    }


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
