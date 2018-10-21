<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin_type;
use App\User;
use App\Voucher;
use Laracasts\Flash\Flash;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Http\Requests\MemberRequest;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;

use Mail;
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
        $value = Auth::user();
        if(empty($value['wallet'])){
            $values=array('readonly'=>'','valor'=>'');
        }else{
            $values=array('readonly'=>'readonly','valor'=>$value['wallet']);
        }
        $criptomoneda= Coin_type::get();
        return view('welcome')->with('cripto',$criptomoneda)->with('wallet',$values);;
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

    public function payWithPaypal($dolar,$moneda,$cantidad)
    {

        Cart::add(['id' => $cantidad, 'name' => $moneda, 'qty' => 1, 'price' => $dolar]);
        $cantidad_facturas=Voucher::count();

        $provider = new ExpressCheckout;
        $data = [];
        $data['items'] = [
            [
                'name' =>  $cantidad.' de '.$moneda,
                'price' => $dolar,
                'qty' => 1
                ]
            ];
            if($cantidad_facturas==0){
                 $invoice=1;
                 $data['invoice_id'] = $invoice;
             }else{
                 $invoice = Voucher::where('id', '=', $cantidad_facturas)->get();
                 $data['invoice_id'] = (int)$invoice[0]['contabilizador_paypal']+1;
             }
                $data['invoice_description'] = "Orden #{$data['invoice_id']} Comprobante";
                $data['return_url'] = url('paypal-success');
                $data['cancel_url'] = url('/home');

                $total = 0;
                foreach($data['items'] as $item) {
                    $total += $item['price']*$item['qty'];
                }

                $data['total'] = $total;
                $response= $provider->setExpressCheckout($data);


                return redirect($response['paypal_link']);
    }
    public function editarDatos($id)
    {
        $user= User::find($id);
        return view('editar')->with('users',$user);
    }
    public function cambiar(MemberRequest $request,$id){

        $user= User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->wallet=$request->wallet;
        $user->save();

        Flash:: warning('¡El usuario '. $user->name. ' ha sido editado con éxito!');
        return view('home');
    }
    public function paypalSuccess(Request $request)
    {
        $total =0;
        $cantidad_facturas=Voucher::count();
        foreach(Cart::content() as $key => $value){
            $data['items'][] = [
                'name'=>$value->id.' de '.$value->name,
                'price'=>$value->price,
                'qty'=>1
            ];
            $canti= $value->id;

        }

        if($cantidad_facturas==0){
            $invoice=1;
            $data['invoice_id'] = $invoice;
        }else{
            $invoice = Voucher::where('id', '=', $cantidad_facturas)->get();
            $data['invoice_id'] = $invoice[0]['contabilizador_paypal']+1;
        }
                $total = $data['items'][0]['price'];
                $data['total'] = $total;
                $data['invoice_description'] = "Orden #{$data['invoice_id']} Comprobante";
                $provider = new ExpressCheckout;
                $token= $request->token;
                $prayerId= $request->PayerID;
                $response = $provider->getExpressCheckoutDetails($token);

                $response = $provider->doExpressCheckoutPayment($data,$token,$prayerId);
                $value = Auth::user();

                if(empty($value['email'])){
                    $correo=$response['PAYMENTINFO_0_SELLERPAYPALACCOUNTID'];
                }else{
                    $correo=$value['email'];
                }
                $list_facturas = array(
                    'user_id'=>$value['id'],
                    'monto_bruto'=>$response['PAYMENTINFO_0_AMT'],
                    'monto_neto'=>round($response['PAYMENTINFO_0_AMT']*0.82,2)-$response['PAYMENTINFO_0_FEEAMT'],
                    'p_pago'=>'PAYPAL',
                    'desc_pago'=>$response['PAYMENTINFO_0_FEEAMT'],
                    'cant_cripto'=>$canti,
                    'tipo_cripto'=>$data['items'][0]['name'],
                    'nume_boleta'=>'B00-00'.$data['invoice_id'],
                    'igv'=>$response['PAYMENTINFO_0_AMT']*0.18,
                    'token'=>$response['TOKEN'],
                    'correo'=>$correo,
                    'fecha_emision'=>$response['PAYMENTINFO_0_ORDERTIME'],
                    'completed'=>$response['PAYMENTINFO_0_PAYMENTSTATUS'],
                    'tipo_pago'=>$response['PAYMENTINFO_0_CURRENCYCODE'],
                    'contabilizador_paypal'=>$data['invoice_id'],

                );
                if(Voucher::insert($list_facturas)){
                    $data=array(
                        'name' => "Cryptoperu",
                    );

                    Mail::send('generacions_pdf',['list_facturas'=>$list_facturas,'nombres'=>Auth::user()['name']],function($message) use ($correo){
                        $message->from($correo,'Cryptoperu');
                        $message->to($correo)->subject('Comprobante Cryptoperu');
                    });

                    Flash::success("!Se ha realizado la transacción de forma exitosa, revisa tu correo!");
                    return view('home');
                }else{
                    Flash::danger("!Sucedió un inconveniente por favor intentarlo nuevamente!");
                    return view('home');
                }


    }
}
