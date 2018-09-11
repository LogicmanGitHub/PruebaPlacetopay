<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('tipo_doc',3);
            $table->string('documento',12);
            $table->string('nombre',60);
            $table->string('apellido',60);
            $table->integer('tipo_cuenta');
            $table->string('cod_banco',4);
            $table->string('banco',60);
            $table->string('descripcion',60);
            $table->double('monto',12,2);
            $table->integer('transac_id');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
