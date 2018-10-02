<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin_type;
use Laracasts\Flash\Flash;
//use App\Http\Requests\CoinRequest;


class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moneda= Coin_type::orderBy('id','ASC')->paginate(5);
        return view('admin.coins_types.index')->with('coins_types',$moneda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coins_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coin = new Coin_type($request->all());



        $coin->save();
        Flash::success("!Se ha registrado la criptomoneda ".$coin->name_coin." de forma exitosa!");
        return redirect()->route('coins_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coin= Coin_type::find($id);
        return view('admin.coins_types.edit')->with('coins',$coin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coin= Coin_type::find($id);
        $coin->name_coin=$request->name_coin;
        $coin->soles=$request->soles;
        $coin->dolares=$request->dolares;

        $coin->save();

        Flash:: warning('¡La criptomoneda '. $coin->name_coin. ' ha sido editada con éxito!');
        return redirect()->route('coins_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = Coin_type::find($id);
        $coin->delete();
        Flash::error('¡La criptomoneda '.$coin->coin_name. ' ha sido borrada de forma exitosa!');
        return redirect()->route('coins_types.index');
    }
}
