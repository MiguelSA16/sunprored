<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('grupo')->nullable();
            $table->string('color')->nullable();
            $table->decimal('longitud', 8,2)->nullable();
            $table->string('nombre');
            $table->string('refprov');
            $table->integer('clapro');
            $table->decimal('pvp1', 8, 2);
            $table->decimal('pvp2', 8, 2);
            $table->decimal('pvp1iva', 8, 2);
            $table->decimal('pvp2iva', 8, 2);
            $table->decimal('prulcom', 8, 2);
            $table->integer('familia_id');
            $table->string('escandallo');
            $table->integer('exist1');
            $table->integer('exist2');
            $table->string('baja');
            $table->integer('orden')->nullable();
            $table->integer('pvpoferta')->nullable();
            $table->string('oferta');
            $table->string('baja_web');           
            $table->string('imagen');
            $table->string('pdf');
            $table->string('slug');           
            $table->text('descripcion');
            $table->integer('sunpro_2018');
            $table->integer('kai_2018');
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
        Schema::dropIfExists('articulos');
    }
}
