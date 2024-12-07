<?php namespace AppAuth\Auth\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use AppAuth\Auth\Models\Auth;
use AppAuth\Auth\Http\Resources\AuthResource;
use RainLab\User\Models\User;
use RainLab\User\Facades\Auth as RainLabAuth;

class AuthController extends Controller
{
    public function login()
    {
        $data = request()->all();
        $user = RainLabAuth::authenticate($data, true);
        return AuthResource::make($user);
    }
    public function register()
    {
        $data = request()->all();
        $user = RainLabAuth::register($data);
        $user->is_activated = true;
        $user->save();
        return AuthResource::make($user);
    }
}