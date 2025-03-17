<?php namespace AppAuth\Google\Http\Controllers;

use Illuminate\Routing\Controller;
use RainLab\User\Models\User;
use AppAuth\Auth\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->getEmail())->first();
        $authController = new AuthController();
        $randomPassword = str_random(16);

        if (!$user) {
            // Register the user if not found
            $payload = [
                'email' => $googleUser->getEmail(),
                'password' => $randomPassword,
                'password_confirmation' => $randomPassword,
            ];
            // Mock the request data
            request()->merge($payload);
            $user = AuthController::register();
        }

        // Update tokens
        $user->update([
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
            'password' => $randomPassword,
            'password_confirmation' => $randomPassword,
        ]);

        $loginPayload = [
            'email' => $googleUser->getEmail(),
            'password' => $randomPassword,
        ];
        request()->merge($loginPayload);
        AuthController::login();

        return redirect('/');
    }
}