<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth()->id();
        $user = User::find($user_id);
        UserResource::withoutWrapping();
        return new UserResource($user);
    }
}
