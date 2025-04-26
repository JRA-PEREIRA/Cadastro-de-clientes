<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Verifica se a tabela original existe
        if (Schema::hasTable('produto')) {
            // Renomeia apenas se a tabela destino não existir
            if (!Schema::hasTable('produtos')) {
                Schema::rename('produto', 'produtos');
            }
        }
    }

    public function down()
    {
        // Reverte a operação
        if (Schema::hasTable('produtos')) {
            Schema::rename('produtos', 'produto');
        }
    }
};