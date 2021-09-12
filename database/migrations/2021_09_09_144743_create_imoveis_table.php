<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('codigo')->unique();
            $table->string('tipo');
            $table->string('pretensao');
            $table->string('titulo');
            $table->string('detalhes');
            $table->integer('quartos');
            $table->decimal('valor',8,2);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
