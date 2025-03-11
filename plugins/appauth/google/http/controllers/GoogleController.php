<?php namespace AppAuth\Google\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use AppAuth\Google\Http\Resources\GoolgeResource;
use RainLab\User\Models\User;
use RainLab\User\Facades\Auth as RainLabAuth;
use GuzzleHttp\Client;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if (!$user) {
                // Register the user if not found
                $randomPassword = str_random(16);
                $user = RainLabAuth::register([
                    'email' => $googleUser->getEmail(),
                    'password' => $randomPassword,
                    'password_confirmation' => $randomPassword,
                ]);
                $user->is_activated = true;
                $user->save();
            }
            
            // Update tokens
            $user->google_token = $googleUser->token;
            $user->google_refresh_token = $googleUser->refreshToken;
            $user->save();
            
            RainLabAuth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}