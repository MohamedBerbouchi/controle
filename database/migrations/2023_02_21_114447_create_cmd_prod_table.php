<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmd_prod', function (Blueprint $table) {
            // $table->integer('cmd_id');
            // $table->integer('prod_id');
            $table->foreignId('cmd_id')->constrained('commandes')->references('numBonCommande');
            $table->foreignId('prod_id')->constrained('produits')->references('idProd');
            // $table->foreign('cmd_id')->references('numBonCommande')->on('prod_id');

            // $table->foreignId('prod_id')->constrained('produits');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmd_prod');
    }
};


 