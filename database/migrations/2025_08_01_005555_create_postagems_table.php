<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('postagem', function (Blueprint $table) {
        $table->string('tipo_cadastro');      // doacao ou perdido
        $table->string('tipo_animal');        // cachorro, gato, outro
        $table->string('outro_animal')->nullable();
        $table->string('tem_nome');           // sim ou nao
        $table->string('nome_pet')->nullable();
        $table->string('raca')->nullable();
        $table->string('genero');             // macho ou fêmea
        $table->string('idade')->nullable();
        $table->string('contato');
        $table->string('ultima_localizacao')->nullable();
        $table->text('informacoes')->nullable();
        $table->string('foto')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
     public function down(): void
     {
         Schema::dropIfExists('postagem');
    }
};
