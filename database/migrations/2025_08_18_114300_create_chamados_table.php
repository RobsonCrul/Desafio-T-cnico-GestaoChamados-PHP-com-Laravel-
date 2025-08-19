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
        // O método `create` da classe Schema cria uma nova tabela no banco de dados, chamada 'chamados'
        Schema::create('chamados', function (Blueprint $table) {
            // Adiciona uma coluna 'id' de incremento automático, que serve como chave primária
            $table->id();
            // Adiciona uma coluna de string para o título do chamado
            $table->string('titulo');
            // Adiciona uma coluna de texto para a descrição do chamado
            $table->text('descricao');
            // Adiciona uma coluna de data para o prazo de solução do chamado
            $table->date('prazo_solucao');
            // Adiciona uma coluna de data para a data de criação do chamado
            $table->date('data_criacao');
            // Adiciona uma coluna de data para a data de solução, permitindo que ela seja nula
            $table->date('data_solucao')->nullable();
            // Adiciona uma chave estrangeira para a tabela 'categorias'
            $table->foreignId('categoria_id')->constrained();
            // Adiciona uma chave estrangeira para a tabela 'situacaos'
            $table->foreignId('situacao_id')->constrained();
            // Adiciona automaticamente as colunas 'created_at' e 'updated_at'
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
    //     Schema::dropIfExists('chamados');
    // }
};