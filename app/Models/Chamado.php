<?php

namespace App\Models; // Define o namespace da Model

use Illuminate\Database\Eloquent\Model; // Importa a classe base da Model do Eloquent
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa a trait para usar factories

class Chamado extends Model // Declara a classe Chamado, que herda as funcionalidades da Model
{
    use HasFactory; // Utiliza a trait HasFactory para permitir a criação de registros com factories

    /**
     * Define os campos da tabela que podem ser preenchidos em massa.
     * Isso é uma medida de segurança para evitar que campos não autorizados sejam alterados.
     */
    protected $fillable = [
        'titulo', // O título do chamado
        'descricao', // A descrição do problema
        'categoria_id', // A chave estrangeira para a categoria
        'situacao_id', // A chave estrangeira para a situação
        'data_solucao', // A data e hora em que o chamado foi resolvido
        'prazo_solucao', // O prazo para a solução do chamado
        'data_criacao', // A data e hora da criação do chamado
    ];

    /**
     * Define o relacionamento de "um para um" reverso (belongsTo) com a Model Categoria.
     * Um Chamado pertence a uma Categoria.
     */
    public function categoria()
    {
        // Retorna a relação, indicando que o Chamado pertence a uma Categoria
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Define o relacionamento de "um para um" reverso (belongsTo) com a Model Situacao.
     * Um Chamado pertence a uma Situação.
     */
    public function situacao()
    {
        // Retorna a relação, indicando que o Chamado pertence a uma Situação
        return $this->belongsTo(Situacao::class);
    }
}