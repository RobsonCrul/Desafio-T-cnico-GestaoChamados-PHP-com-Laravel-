<?php

namespace Database\Seeders; // Define o namespace do seeder

use Illuminate\Database\Seeder; // Importa a classe base para seeders
use Illuminate\Support\Facades\DB; // Importa a Facade DB para interagir diretamente com o banco de dados

class SituacaoSeeder extends Seeder // Declara a classe do seeder, estendendo a classe base
{
    /**
     * O método `run` é o ponto de entrada para a execução do seeder.
     * Ele é chamado quando o comando `db:seed` é executado.
     */
    public function run(): void
    {
        // Usa a Facade DB para inserir um array de dados na tabela 'situacaos'
        DB::table('situacaos')->insert([
            // Cada array interno representa uma linha na tabela
            ['nome' => 'Novo'], // Insere a situação 'Novo'
            ['nome' => 'Pendente'], // Insere a situação 'Pendente'
            ['nome' => 'Resolvido'], // Insere a situação 'Resolvido'
        ]);
    }
}