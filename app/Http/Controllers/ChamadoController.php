<?php

namespace App\Http\Controllers; // Define o namespace do controlador

use App\Models\Chamado; // Importa a Model Chamado para interagir com a tabela 'chamados'
use App\Models\Categoria; // Importa a Model Categoria para interagir com a tabela 'categorias'
use App\Models\Situacao; // Importa a Model Situacao para interagir com a tabela 'situacaos'
use Illuminate\Http\Request; // Importa a classe Request para lidar com as requisições HTTP

class ChamadoController extends Controller // Declara a classe do controlador, estendendo a classe base de controladores
{
    /**
     * Exibe a lista de todos os chamados.
     */
    public function index()
    {
        // Obtém todos os chamados do banco de dados, carregando também os relacionamentos de categoria e situacao
        $chamados = Chamado::with('categoria', 'situacao')->get(); 
        // Retorna a view 'index' e passa a variável 'chamados' para ela
        return view('index', compact('chamados')); 
    }

    /**
     * Exibe o formulário para criar um novo chamado.
     */
    public function create()
    {
        // Obtém todas as categorias do banco de dados para popular o campo de seleção no formulário
        $categorias = Categoria::all(); 
        // Retorna a view 'create' e passa a variável 'categorias' para ela
        return view('create', compact('categorias')); 
    }

    /**
     * Armazena um novo chamado no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados da requisição, garantindo que os campos são obrigatórios e válidos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        
        // Preenche o campo `situacao_id` dinamicamente buscando o ID da situação 'Novo'
        $situacaoNovo = Situacao::where('nome', 'Novo')->firstOrFail();

        // Cria uma nova instância da Model Chamado
        $chamado = new Chamado();
        
        // Atribui os dados recebidos do formulário
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria_id = $request->categoria_id;

        // Atribui os dados automáticos, como a situação inicial, data de criação e prazo de solução
        $chamado->situacao_id = $situacaoNovo->id;
        $chamado->data_criacao = now();
        $chamado->prazo_solucao = now()->addDays(3);

        // Salva o novo registro no banco de dados
        $chamado->save();

        // Redireciona para a rota 'dashboard' com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Chamado criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um chamado específico.
     * Este método é opcional, mas útil para mostrar detalhes de um chamado.
     */
    public function show(Chamado $chamado)
    {
        // O código para exibir detalhes iria aqui
    }

    /**
     * Exibe o formulário para editar um chamado existente.
     */
    public function edit(Chamado $chamado)
    {
        // Obtém todas as categorias para popular o campo de seleção
        $categorias = Categoria::all(); 
        // Obtém todas as situações para popular o campo de seleção
        $situacoes = Situacao::all(); 
        // Obtém apenas as situações 'Pendente' e 'Resolvido' para o formulário de edição
        $situacoes = Situacao::whereIn('nome', ['Pendente', 'Resolvido'])->get(); 
        // Retorna a view 'edit' e passa o chamado, categorias e situações para ela
        return view('edit', compact('chamado', 'categorias', 'situacoes')); 
    }

    /**
     * Atualiza um chamado existente no banco de dados.
     */
    public function update(Request $request, Chamado $chamado)
    {
        // Valida os dados da requisição para garantir a integridade
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'situacao_id' => 'required|exists:situacaos,id',
        ]);

        // Preenche a model 'Chamado' com os dados validados do formulário
        $chamado->fill($validated);

        // Encontra o ID da situação 'Resolvido' para a lógica de data
        $situacaoResolvido = Situacao::where('nome', 'Resolvido')->first()->id;

        // Condição para preencher ou limpar a data de solução com base no status
        if ($request->situacao_id == $situacaoResolvido) {
            // Se a situação for alterada para 'Resolvido', preenche a data de solução com a data e hora atuais
            $chamado->data_solucao = now();
        } else {
            // Se for alterada para outra coisa, limpa a data de solução
            $chamado->data_solucao = null;
        }
        
        // Salva todas as alterações no banco de dados
        $chamado->save();

        // Esta linha é redundante, pois a linha acima já salvou os dados
        // $chamado->update($validated);

        // Redireciona para a lista de chamados com uma mensagem de sucesso
        return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    /**
     * Remove um chamado do banco de dados.
     */
    public function destroy(Chamado $chamado)
    {
        // Deleta o registro do chamado do banco de dados
        $chamado->delete();
        // Redireciona para a lista de chamados com uma mensagem de sucesso
        return redirect()->route('chamados.index')->with('success', 'Chamado excluído com sucesso!');
    }
}