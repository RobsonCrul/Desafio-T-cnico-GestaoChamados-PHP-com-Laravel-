<?php

namespace App\Http\Controllers; // Define o namespace do controlador

use Carbon\Carbon; // Importa a classe Carbon para manipulação de datas e horas
use App\Models\Chamado; // Importa a Model Chamado para interagir com a tabela 'chamados'
use App\Models\Situacao; // Importa a Model Situacao para interagir com a tabela 'situacaos'
use App\Models\Categoria; // Importa a Model Categoria para interagir com a tabela 'categorias'

class DashBoardController extends Controller // Declara a classe do controlador, estendendo a classe base de controladores
{
    /**
     * Exibe a página do dashboard com as métricas e estatísticas.
     */
    public function index()
    {
        // Conta o número total de chamados na tabela
        $totalChamados = Chamado::count();
        // Busca a situação 'Resolvido' no banco de dados
        $situacaoResolvido = Situacao::where('nome', 'Resolvido')->first();
        // Busca a situação 'Novo' no banco de dados
        $situacaoNovo = Situacao::where('nome', 'Novo')->first();

        // Conta o número de chamados com a situação 'Novo' (abertos)
        $chamadosAbertos = Chamado::where('situacao_id', $situacaoNovo->id)->count();
        // Conta o número de chamados com a situação 'Resolvido'
        $chamadosResolvidos = Chamado::where('situacao_id', $situacaoResolvido->id)->count();
        // Obtém todas as categorias e conta quantos chamados cada uma possui
        $categorias = Categoria::withCount('chamados')->get();

        // Lógica para calcular o SLA (Service Level Agreement)
        // Obtém a data do primeiro e último dia do mês atual
        $primeiroDiaMes = Carbon::now()->startOfMonth();
        $ultimoDiaMes = Carbon::now()->endOfMonth();

        // Conta o número de chamados resolvidos no mês atual
        $chamadosResolvidosMes = Chamado::where('situacao_id', $situacaoResolvido->id)
            ->whereBetween('data_solucao', [$primeiroDiaMes, $ultimoDiaMes])
            ->count();  

        // Conta o número de chamados resolvidos dentro do prazo no mês atual
        $chamadosDentroDoPrazo = Chamado::where('situacao_id', $situacaoResolvido->id)
            // Compara se a data de solução é menor ou igual ao prazo de solução
            ->whereColumn('data_solucao', '<=', 'prazo_solucao')
            // Filtra os chamados resolvidos no mês atual
            ->whereBetween('data_solucao', [$primeiroDiaMes, $ultimoDiaMes])
            ->count();

        // Calcula o SLA: porcentagem de chamados resolvidos no prazo
        // Evita divisão por zero
        $sla = ($chamadosResolvidosMes > 0) ? ($chamadosDentroDoPrazo / $chamadosResolvidosMes) * 100 : 0;
        // Formata o valor do SLA com duas casas decimais
        $sla = number_format($sla, 2);

        // Retorna a view 'dashboard' e passa todas as variáveis calculadas
        return view('dashboard', compact(
            'totalChamados',
            'chamadosAbertos',
            'chamadosResolvidos',
            'categorias',
            'sla',
        ));
    }
}