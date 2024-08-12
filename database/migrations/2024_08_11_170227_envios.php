<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->integer('IDUser');
            $table->integer('IDEmail');
            $table->integer('IDMensagem');
            $table->text('Mensagem');
            $table->text('Anexos');
            $table->integer('IDInstituicao');
            $table->timestamp('Hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
