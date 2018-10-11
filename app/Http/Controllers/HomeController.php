<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin_type;
use Srmklive\PayPal\Services\ExpressCheckout;

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

    public function noticiasCriptomonedas(){
        return view('noticias');
    }

    public function consultarCriptomonedas(Request $request)
    {
        $id_moneda = $request->id_moneda;
        $moneda= Coin_type::find($id_moneda);
        $list_valor= array('soles'=>$moneda->soles,'dolares'=>$moneda->dolares);

        echo json_encode($list_valor);
    }

    public function payWithPaypal()
    {

        $provider = new ExpressCheckout;
                $data = [];
                $data['items'] = [
                    [
                        'name' => 'Product 1',
                        'price' => 9.99,
                        'qty' => 1
                    ]
                ];

                $data['invoice_id'] = 1;
                $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
                $data['return_url'] = url('paypal-success');
                $data['cancel_url'] = url('/cart');

                $total = 0;
                foreach($data['items'] as $item) {
                    $total += $item['price']*$item['qty'];
                }

                $data['total'] = $total;
                $response= $provider->setExpressCheckout($data);

                return redirect($response['paypal_link']);
    }

    public function paypalSuccess(Request $request)
    {
        $provider = new ExpressCheckout;
        $token= $request->token;
        $prayerId= $request->prayerId;
        $response = $provider->getExpressCheckoutDetails($token);
        dd($response);
    }
}
