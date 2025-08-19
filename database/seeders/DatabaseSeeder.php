<?php

namespace Database\Seeders; // Define o namespace do seeder principal

use App\Models\User; // Importa a Model User (neste código, ela não é usada, mas é comum em projetos)
use Illuminate\Database\Seeder; // Importa a classe base para seeders

class DatabaseSeeder extends Seeder // Declara a classe do seeder, estendendo a classe base
{
    /**
     * O método `run` é o ponto de entrada principal para a execução dos seeders.
     * É aqui que você chama outros seeders.
     */
    public function run(): void
    {
        // O método `call` executa um array de classes de seeder.
        // A ordem é importante, pois 'SituacaoSeeder' e 'CategoriaSeeder'
        // precisam ser executados antes de qualquer seeder que dependa deles.
        $this->call([
            SituacaoSeeder::class, // Chama o seeder responsável por popular a tabela 'situacaos'
            CategoriaSeeder::class, // Chama o seeder responsável por popular a tabela 'categorias'
        ]);
    }
}