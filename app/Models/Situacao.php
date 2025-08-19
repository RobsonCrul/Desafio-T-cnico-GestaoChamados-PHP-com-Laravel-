<?php

namespace App\Models; // Define o namespace da Model, seguindo a estrutura de pastas do Laravel

use Illuminate\Database\Eloquent\Model; // Importa a classe base da Model do Eloquent

class Situacao extends Model // Declara a classe Situacao, que herda as funcionalidades da Model
{
    /**
     * Define os campos da tabela que podem ser preenchidos em massa.
     * Neste caso, apenas o campo 'nome' pode ser preenchido por métodos como fill() ou create().
     */
    protected $fillable = ['nome'];

    /**
     * Define o relacionamento de "um para muitos" (one-to-many) com a Model Chamado.
     * Uma Situação (por exemplo, "Resolvido") pode ter muitos Chamados associados a ela.
     */
    public function chamados()
    {
        // Retorna a relação, indicando que a Situação "tem muitos" Chamados
        return $this->hasMany(Chamado::class);
    }
}