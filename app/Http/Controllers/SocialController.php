<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectFacebook()
    {

            return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
            $user = Socialite::driver('facebook')->user();
            dd($user);die();
            return($user->getId());die();
    }

    public function redirectTwitter()
    {
            return Socialite::driver('twitter')->redirect();
    }

    public function callbackTwitter()
    {
            $user = Socialite::driver('twitter')->user();
            dd($user);die();
            return($user->getId());die();
    }

    public function redirectGoogle()
    {
            return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
            $user = Socialite::driver('google')->user();
            dd($user);die();
            return($user->getId());die();
    }
}
