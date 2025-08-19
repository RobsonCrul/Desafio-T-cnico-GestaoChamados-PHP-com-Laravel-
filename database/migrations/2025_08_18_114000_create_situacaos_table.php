<?php

use Illuminate\Database\Migrations\Migration; // Importa a classe base para migrações
use Illuminate\Database\Schema\Blueprint; // Importa a classe Blueprint para definir a estrutura da tabela
use Illuminate\Support\Facades\Schema; // Importa a Facade Schema para interagir com o esquema do banco de dados

// Retorna uma nova classe anônima que estende a classe Migration
return new class extends Migration
{
    /**
     * O método `up` é executado quando a migração é rodada. Ele cria a tabela.
     */
    public function up(): void
    {
        // Cria uma nova tabela chamada 'situacaos'
        Schema::create('situacaos', function (Blueprint $table) {
            // Adiciona uma coluna de incremento automático para a chave primária
            $table->id(); 
            // Adiciona uma coluna de string para o nome da situação
            $table->string('nome'); 
            // Adiciona as colunas 'created_at' e 'updated_at' automaticamente
            $table->timestamps(); 
        });
    }

    /**
     * O método `down` é executado quando a migração é revertida. Ele remove a tabela.
     * (Não implementado neste código, mas é uma prática comum)
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('situacaos');
    // }
};