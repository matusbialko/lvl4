<?php namespace AppAuth\Google\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use RainLab\User\Models\User;
use AppAuth\Auth\Http\Controllers\AuthController;
use RainLab\User\Facades\Auth as RainLabAuth;
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
                $user = $authController->register($payload);
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
            $authController->login($loginPayload);

            return redirect('/');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}