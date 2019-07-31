<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver('$provider')->redirect();

    }
}
