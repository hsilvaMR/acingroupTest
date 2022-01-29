<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('email', 50);
            $table->string('telemovel', 100);
            $table->unsignedBigInteger('automovel_id');
            $table->foreign('automovel_id')->references('id')->on('automovels');
        });


       /* Schema::table('clientes', function (Blueprint $table) {

            $table->string('nome', 100);
            $table->string('email', 50);
            $table->string('telemovel', 100);
            $table->unsignedBigInteger('automovels_id');
            $table->foreign('automovels_id')->references('id')->on('automovels');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
