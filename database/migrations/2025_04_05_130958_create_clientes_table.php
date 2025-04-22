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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('matricula')->unique(); // matrícula como identificador único
        $table->decimal('saldo', 10, 2)->default(0); // saldo com 2 casas decimais
        $table->string('nome');
        $table->date('data_nascimento');
        $table->string('genero');
        $table->string('endereco');
        $table->string('cep');
        $table->string('cpf')->unique();
        $table->string('rg')->nullable();
        $table->string('celular');
        $table->string('email')->unique();
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
