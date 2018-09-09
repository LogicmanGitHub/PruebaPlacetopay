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


Route::get('/', function () {
    return view('home');
});

Route::get('/nuevopago','PagosPSEController@create');

Route::get('/bancos',function(){
    /*$opts = array(
        'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
    );
    $params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );*/

	$seed=date('c');
	$tranKey="024h1IlD";
    $hashString = sha1( $seed.$tranKey , false );


    $params = array ('login' => '6dd490faf9cb87a9862245da41170ff2','tranKey' => $hashString,'seed' =>$seed,'additional' => ['name' => 'prueba','value' =>0]);


    /*$params = array ('login' => '6dd490faf9cb87a9862245da41170ff2',
            'password' => '024h1IlD',
            'encoding' => 'UTF-8',
            'trace' => true);*/

    $url = "https://test.placetopay.com/soap/pse/?wsdl";

    try{
        $client = new SoapClient($url,$params);
        dd($client->GetBankList(['auth' => $params ]));

    }
    catch(SoapFault $fault) {
        echo '<br>'.$fault;
    }

});
