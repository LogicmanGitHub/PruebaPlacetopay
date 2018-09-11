<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PagoFormRequest;

use SoapClient;
use App\Pagos;

const CURRENCY_COLOMBIA = 'COP';
const LANGUAGE_SPANISH = 'es';


class PagosPSEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aStatus=['FALLIDO','APROBADO','RECHAZADO','PENDIENTE'];
        $aPagos=Pagos::All();
        return view('pagos.index',['aPagos' => $aPagos, 'aStatus' => $aStatus ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cleanCache()
    {
       \Cache::flush(); 
    }

    public function create()
    {

        $aBancos=[];
        $fecha_actual=date("Y-m-d");

        if (!\Cache::has('ult_fecha')) {
            \Cache::forever('ult_fecha', $fecha_actual);
        }

        $ult_fecha=\Cache::get('ult_fecha');

        if (!\Cache::has('bancos')) {
            $aBancos=$this->getBanks();;
        }

        if ($fecha_actual>$ult_fecha){ //Condicion para recargar lista de bancos diariamente
                $aBancos=$this->getBanks();
                \Cache::forever('ult_fecha', $fecha_actual);
        }

        $aBancos=\Cache::get('bancos'); //Recuperamos la lista de Bancos del Cache
     
        return view('pagos.create',compact('aBancos'));
    }

    public function getBanks(){
            $seed=date('c');
            $tranKey="024h1IlD";
            $hashString = sha1( $seed.$tranKey , false );

            $aBanks=[];
            $params = array ('login' => '6dd490faf9cb87a9862245da41170ff2',
                             'tranKey' => $hashString,
                             'seed' =>$seed);

            $url = "https://test.placetopay.com/soap/pse/?wsdl";

            try{
                $client = new SoapClient($url,$params);
                $aBanks=$client->GetBankList(['auth' => $params ])->getBankListResult->item;
                \Cache::forever('bancos', $aBanks);

            }
            catch(SoapFault $fault) {
                echo '<br>'.$fault;
            }

            return $aBanks;

    }


   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagoFormRequest $request)
    {
         $languageCode = LANGUAGE_SPANISH;
         $currencyCode = CURRENCY_COLOMBIA;

         $navegador = "Navegador";//get_browser(null, true);

         $slug= uniqid();

         $seed=date('c');
         $tranKey="024h1IlD";
         $hashString = sha1( $seed.$tranKey , false );
         $fecha_actual=date('Y-m-d');

         $data_conex = array (
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'tranKey' => $hashString,'seed' =>$seed,
                'additional' => ['name' => 'prueba','value' =>0]
            );

         $data_transacc=array (
                        'bankCode' => $request->selbanco,
                        'bankInterface' => $request->seltipocta,
                        'reference' => $slug,
                        'description' => $request->descripcion,
                        'language' => $languageCode,
                        'currency' => $currencyCode,
                        'totalAmount' => $request->monto,
                        'payer' => ['document' => $request->documento,
                                    'documentType' => $request->seltipodoc,
                                    'firstName' => $request->nombre,
                                    'lastName' => $request->apellido,
                                    'company' => $request->empresa,
                                    'emailAddress' => $request->email,
                                    'address' => $request->direccion,
                                    'city' => $request->ciudad,
                                    'provincia' => $request->provincia,
                                    'country' => $request->country,
                                    'phone' => $request->telefono,
                                    'mobile' => $request->movil

                                    ],
                        'ipAddress' => $request->ip(), 
                        'userAgent' => $navegador,
                        'returnURL' =>"http://placetopay.com.dev"
            );

   

         $url = "https://test.placetopay.com/soap/pse/?wsdl";

         try{
             $client = new SoapClient($url,$data_conex);
             $responseTransacc=$client->createTransaction(['auth' => $data_conex, 'transaction' =>  $data_transacc])->createTransactionResult;


            $pago = new Pagos(array(
                    'fecha'  => $fecha_actual,
                    'tipo_doc' =>$request->seltipodoc ,
                    'documento' => $request->documento,
                    'nombre' => $request->nombre,
                    'apellido'  => $request->apellido,
                    'tipo_cuenta' => $request->seltipocta,
                    'cod_banco' => $request->selbanco,
                    'banco' => "",
                    'descripcion' => $request->descripcion,
                    'monto' => $request->monto,
                    'transac_id' => $responseTransacc->transactionID,
                    'status' => $responseTransacc->responseCode

            ));

             //dd($responseTransacc);
            $result=$pago->save();

         }
         catch(SoapFault $fault) {
             echo '<br>'.$fault;
         }

         return redirect(action('PagosPSEController@index'));

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
