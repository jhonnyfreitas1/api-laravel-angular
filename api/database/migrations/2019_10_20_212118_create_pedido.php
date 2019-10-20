<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedido extends Migration
{

    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_produto');
            $table->string('email_comprador');
            $table->timestamps();
            $table->foreign('email_comprador')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
