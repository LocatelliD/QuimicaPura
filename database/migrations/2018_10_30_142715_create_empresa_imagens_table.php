<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->text('arquivo');
            $table->integer('cod_empresa')->unsigned();
            $table->foreign('cod_empresa')->references('id')->on('empresa')->onDelete('cascade');
            
            $table->foreign('cod_empresa')
            ->references('id')->on('empresa')
            ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_imagens');
    }
}
