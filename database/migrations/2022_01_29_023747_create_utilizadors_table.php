<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('email', 50);
            $table->string('senha', 50);
            $table->string('tipo', 255);
        });


        /*Schema::table('utilizadors', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('email', 50);
            $table->string('senha', 50);
            $table->string('tipo', 255);
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilizadors');
    }
}
