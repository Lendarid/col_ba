<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Collectes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->float('PoidsPal');
            $table->float('PoidsGrille');
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
        Schema::dropIfExists('Collectes');
    }
}
