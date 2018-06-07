<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produits', function (Blueprint $table) {
          $table->increments('id');
          $table->string('ID_Fournisseur');
          $table->string('ID_Collecte');
          $table->integer('Poids');
          $table->float('NbPal');
          $table->float('NbGrille');
          $table->string('ID_User');
          $table->boolean('Valider');
          $table->timestamp('Creation');
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
        Schema::dropIfExists('Produits');
    }
}
