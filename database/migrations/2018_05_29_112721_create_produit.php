<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produit', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ID_Fournisseur');
          $table->string('ID_Collecte');
          $table->integer('Poids');
          $table->float('NbPal');
          $table->float('NbGrille');
          $table->timestamp('Creation');
          $table->timestamp('Modification');
          $table->integer('ID_User');
          $table->boolean('Valider');
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
        Schema::dropIfExists('Produit');
    }
}
