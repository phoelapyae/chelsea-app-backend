<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Aws\Result;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob' => 'required',
            'avatar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'dob' => $request->get('dob'),
            'password' => Hash::make($request->get('password')),
            'confirm_password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'dob' => $user->dob,
            'avatar' => $user->avatar == null ? '' : 'localhost:8000/users/' . $user->avatar,
            'phone_no' => "",
            'access_token' => $token,
            'token_type' => 'bearer',
            'expiry_in' => config('jwt.ttl'),
        ]);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'dob' => $user->dob,
            'avatar' => $user->avatar == null ? '' : 'localhost:8000/users/' . $user->avatar,
            'phone_no' => "",
            'access_token' => $token,
            'token_type' => 'bearer',
            'expiry_in' => config('jwt.ttl'),
        ]);
    }

    public function updateProfile(Request $request)
    {
        if ($request->email) {
            $email = User::where('email', $request->email)->first();
            if ($email) {
                return response()->json(['error' => 'Already exist with this email address.'], 422);
            }
        }

        $validator = Validator::make($request->all(), [
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::find(Auth()->id());
        $user->name = $request->name ? $request->name : $user->name;
        $user->dob = $request->dob ? $request->dob : $user->dob;
        $user->email = $request->email ? $request->email : $user->email;
        $user->password = $request->password ? Hash::make($request->get('password')) : $user->password;
        $user->save();
        UserResource::withoutWrapping();
        return new UserResource($user);
    }

    public function uploadAvatar(Request $request)
    {

        $avatar = uploadFile($request['file'], "/users/");
        $user = User::find(auth()->id());
        $user->avatar = $avatar;
        UserResource::withoutWrapping();
        return new UserResource($user);
    }
}
