<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin_type;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function redesSociales()
    {
        return view('home');
    }

    public function comprarCriptomonedas()
    {
        $criptomoneda= Coin_type::get();
        return view('welcome')->with('cripto',$criptomoneda);
    }

    public function consultarCriptomonedas()
    {
        echo "hola"; die();
        $id_moneda = Input::get('id_moneda');
        $criptomoneda= Coin_type::get();
        return view('welcome')->with('cripto',$criptomoneda);
    }
}
