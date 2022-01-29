<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       Schema::dropIfExists('automovels');
       Schema::create('automovels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('marca', 100);
            $table->string('matricula', 50);
            $table->string('proprietario', 50);
            $table->string('tipo', 255);
            $table->unsignedBigInteger('manutencao_id');
            $table->foreign('manutencao_id')->references('id')->on('manutencaos');
        });

        /*Schema::table('automovels', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('marca', 100);
            $table->string('matricula', 50);
            $table->string('proprietario', 50);
            $table->string('tipo', 255);
            $table->unsignedBigInteger('manutencao_id');
            $table->foreign('manutencao_id')->references('id')->on('manutencaos');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automovels');
    }
}
