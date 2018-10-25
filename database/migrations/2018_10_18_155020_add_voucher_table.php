<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->float('monto_bruto', 8, 2);
            $table->float('monto_neto', 8, 2);
            $table->string('p_pago');
            $table->float('desc_pago', 8, 2);
            $table->float('cant_cripto', 8, 2);
            $table->string('tipo_cripto');
            $table->string('nume_boleta');
            $table->float('igv', 8, 2);
            $table->string('token');
            $table->string('correo');
            $table->string('fecha_emision');
            $table->string('completed');
            $table->string('tipo_pago');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vouchers');
    }
}
