<?php

namespace Database\Seeders; // Define o namespace do seeder, indicando que ele pertence ao diretório de seeders

use Illuminate\Database\Seeder; // Importa a classe base para seeders
use Illuminate\Support\Facades\DB; // Importa a Facade DB para interagir com o banco de dados

class CategoriaSeeder extends Seeder // Declara a classe do seeder, estendendo a classe base
{
    /**
     * O método `run` é o ponto de entrada para a execução do seeder.
     * Ele é chamado quando o comando `db:seed` é executado.
     */
    public function run(): void
    {
        // Usa a Facade DB para inserir dados diretamente na tabela 'categorias'
        DB::table('categorias')->insert([
            // Cria um array de arrays para inserir múltiplos registros de uma vez
            ['nome' => 'Problema de Software'],
            ['nome' => 'Problema de Hardware'],
            ['nome' => 'Rede/Internet'],
            ['nome' => 'Acesso e Permissões'],
            ['nome' => 'Manutenção Predial'],
            ['nome' => 'Recursos Humanos'],
            ['nome' => 'Financeiro'],
            ['nome' => 'Outros'],
        ]);
    }
}