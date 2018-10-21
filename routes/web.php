<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTAS DEL FRONTEND

Route::get('/', [
    'as'=>'front.index',
    'uses'=>'FrontController@index'
]);

//RUTAS DEL PANEL DE ADMINISTRACION

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::group(['middleware'=>['admin']],function(){
    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'  =>'users.destroy'
    ]);
    });
    Route::resource('coins_types','CoinsController');
    Route::get('coins_types/{id}/destroy',[
        'uses'=>'CoinsController@destroy',
        'as'  =>'coins_types.destroy'
    ]);
});
Auth::routes();


Route::get('/redes', 'HomeController@redesSociales')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/comprar', 'HomeController@comprarCriptomonedas');

Route::get('/noticias', function () {
    return view('noticias');
});
Route::get('/preguntas', function () {
    return view('preguntas');
});
Route::post('/consultar', 'HomeController@consultarCriptomonedas');
Route::get('/redirectF', 'SocialController@redirectFacebook');
Route::get('/callbackF', 'SocialController@callbackFacebook');
Route::get('/redirectT', 'SocialController@redirectTwitter');
Route::get('/callbackT', 'SocialController@callbackTwitter');
Route::get('/redirectG', 'SocialController@redirectGoogle');
Route::get('/callbackG', 'SocialController@callbackGoogle');
Route::get('/editar-datos-personales/{codigo}', 'HomeController@editarDatos')->name('payment.editar');
Route::put('/cambiar-datos-personales/{codigo}', 'HomeController@cambiar')->name('payment.update');
Route::get('/pay-with-paypal/{precio}/{detalle}/{cantidad}', 'HomeController@payWithPaypal')->name('payment.paypal');
Route::get('/paypal-success', 'HomeController@paypalSuccess')->name('payment.paypalSuccess');
Route::put('/generar-comprobante/{user}', 'HomeController@generarPdf')->name('payment.pdf');
Route::get('sendemail',function(){
    $data=array(
        'name' => "Laravel",
    );
    Mail::send('emails.welcome',$data,function($message){
        $message->from('marcodiazzavala@gmail.com','Test');
        $message->to('susoconde@gmail.com')->subject('Test email');
    });
});

