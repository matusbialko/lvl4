<?php namespace AppAuth\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use AppAuth\Auth\Http\Resources\AuthResource;
use RainLab\User\Facades\Auth as RainLabAuth;

class AuthController extends Controller
{
    public static function login()
    {
        $data = request()->only(['email', 'password']);
        $user = RainLabAuth::authenticate($data, true);
        return AuthResource::make($user);
    }
    public static function register()
    {
        $data = request()->all();
        $user = RainLabAuth::register($data);
        $user->is_activated = true;
        $user->save();
        return AuthResource::make($user);
    }
}