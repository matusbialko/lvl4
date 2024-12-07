<?php namespace AppAuth\Google\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use AppAuth\Google\Http\Resources\GoolgeResource;
use RainLab\User\Models\User;
use RainLab\User\Facades\Auth as RainLabAuth;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'redirect_uri'  => env('GOOGLE_REDIRECT'),
            'response_type' => 'code',
            'scope'         => 'email profile',
            'access_type'   => 'offline',
        ]);

        return redirect("https://accounts.google.com/o/oauth2/v2/auth?$query");
    }
    public function callback()
    {
        $data = request()->all();
        return $data;
    }
}