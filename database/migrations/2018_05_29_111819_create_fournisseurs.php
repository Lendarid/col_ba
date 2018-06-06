<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fournisseurs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('VIF',8);->unique();
          $table->string('Intitule');
          $table->string('Enseigne');
          $table->string('Ville');
          $table->string('CodePostal',5);
          $table->string('LibelleReduit');
          $table->boolean('Actif');
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
        Schema::dropIfExists('Fournisseurs');
    }
}
