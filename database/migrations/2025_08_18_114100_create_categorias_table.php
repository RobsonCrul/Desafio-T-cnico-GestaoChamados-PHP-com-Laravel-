<?php

use Illuminate\Database\Migrations\Migration; // Importa a classe base para migrações do Laravel
use Illuminate\Database\Schema\Blueprint; // Importa a classe Blueprint para definir a estrutura das tabelas
use Illuminate\Support\Facades\Schema; // Importa a Facade Schema para interagir com o esquema do banco de dados

// Retorna uma nova classe anônima que estende a classe Migration
return new class extends Migration
{
    /**
     * O método `up` é executado quando a migração é rodada.
     * Sua função é criar a tabela no banco de dados.
     */
    public function up(): void
    {
        // O método `create` da classe Schema cria uma nova tabela no banco de dados
        Schema::create('categorias', function (Blueprint $table) {
            // Adiciona uma coluna 'id' de incremento automático, que serve como chave primária
            $table->id();
            // Adiciona uma coluna de string para armazenar o nome da categoria
            $table->string('nome');
            // Adiciona automaticamente as colunas 'created_at' e 'updated_at' para rastrear a criação e a última atualização do registro
            $table->timestamps();
        });
    }

    /**
     * O método `down` é executado quando a migração é revertida.
     * Sua função é remover a tabela do banco de dados.
     * (Não implementado neste código, mas é uma boa prática)
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('categorias');
    // }
};