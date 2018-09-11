<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
     protected $fillable = [
        'fecha', 'tipo_doc', 'documento','nombre','apellido','tipo_cuenta','cod_banco','banco',
        'descripcion','monto','transac_id','status'
    ];
}
