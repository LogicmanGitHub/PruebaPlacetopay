<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class PagosPSEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $seed=date('c');
        $tranKey="024h1IlD";
        $hashString = sha1( $seed.$tranKey , false );

        $params = array ('login' => '6dd490faf9cb87a9862245da41170ff2','tranKey' => $hashString,'seed' =>$seed,'additional' => ['name' => 'prueba','value' =>0]);

        $url = "https://test.placetopay.com/soap/pse/?wsdl";

        try{
            $client = new SoapClient($url,$params);
            $aBancos=$client->GetBankList(['auth' => $params ]);

        }
        catch(SoapFault $fault) {
            echo '<br>'.$fault;
        }


        return view('pagos.create',['aBancos' => $aBancos]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
