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
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ebd_id');
            $table->foreign('ebd_id')->references('id')->on('ebds');

            $table->integer("numero");
            $table->string('classe')->nullable();
            $table->text("pergunta");
            $table->text("resposta")->nullable();
            $table->string("texto_referencia")->nullable();

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
        Schema::dropIfExists('perguntas');
    }
};
