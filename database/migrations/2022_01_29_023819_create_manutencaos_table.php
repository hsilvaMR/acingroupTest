<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManutencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('utilizador_id');
            $table->string('tipo_manutecao', 100);
            $table->string('data', 100);
            $table->string('status', 100);
            $table->double('valor', 8, 2);
            // relação um para um 
            $table->foreign('utilizador_id')->references('id')->on('utilizadors');
            // relação um para um 
            $table->unique('utilizador_id');
        });

       /* Schema::table('manutencaos', function (Blueprint $table) {

            $table->unsignedBigInteger('utilizadors_id');
            $table->string('tipo_manutecao', 100);
            $table->string('data', 100);
            $table->string('status', 100);
            $table->double('valor', 8, 2);
            // relação um para um 
            $table->foreign('utilizadors_id')->references('id')->on('utilizadors');
            // relação um para um 
            $table->unique('utilizadors_id');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencaos');
    }
}
