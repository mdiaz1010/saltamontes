<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use Auth;
class SocialController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '';
    public function redirectFacebook()
    {

            return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
            $user = Socialite::driver('facebook')->user();
            $idsocial= User::where('idsocial',$user->id)->first();
            if($idsocial){
                    if(Auth::loginUsingId($idsocial->id)){
                            return redirect()->route('home');
                    }
            }
            $usuarioRegistro=User::create([
            'name'              => $user->user['name'],
            'email'             => $user->email,
            'password'          => bcrypt('1234'),
            'idsocial'          => $user->id,
            'foto_perfil'       => $user->avatar_original,
            'link_pagina'       => $user->profileUrl,
            'foto_portada'      => '0',
        ]);
        if($usuarioRegistro){
                if(Auth::loginUsingId($usuarioRegistro->id)){
                        return redirect()->route('home');
                }
        }

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
            $idsocial= User::where('idsocial',$user->id)->first();
            if($idsocial){
                    if(Auth::loginUsingId($idsocial->id)){
                            return redirect()->route('home');
                    }
            }
            $usuarioRegistro=User::create([
            'name'              => $user->name,
            'email'             => $user->email,
            'password'          => bcrypt('1234'),
            'idsocial'          => $user->id,
            'foto_perfil'       => $user->avatar,
            'link_pagina'       => $user->avatar_original,
            'foto_portada'      => '0',
        ]);
        if($usuarioRegistro){
                if(Auth::loginUsingId($usuarioRegistro->id)){
                        return redirect()->route('home');
                }
        }
    }
}
