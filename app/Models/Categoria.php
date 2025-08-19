<?php

namespace App\Models; // Define o namespace da Model, seguindo a estrutura de pastas do Laravel

use Illuminate\Database\Eloquent\Model; // Importa a classe base da Model do Eloquent

class Categoria extends Model // Declara a classe Categoria, que herda as funcionalidades da Model
{
    /**
     * Define os campos da tabela que podem ser preenchidos em massa.
     * Isso é uma medida de segurança para evitar que campos não autorizados sejam alterados.
     */
    protected $fillable = ['nome'];

    /**
     * Define o relacionamento de "um para muitos" (one-to-many) com a Model Chamado.
     * Uma Categoria pode ter muitos Chamados.
     */
    public function chamados()
    {
        // Retorna a relação, indicando que a Categoria "tem muitos" Chamados
        return $this->hasMany(Chamado::class);
    }
}