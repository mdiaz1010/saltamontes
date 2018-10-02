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

    public function redirect()
    {

            return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
            $user = Socialite::driver('facebook')->user();
            dd($user->getId()); die();
            return($user->getId());die();
    }

}
