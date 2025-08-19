@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Chamados</h1>

    <div>
        <!-- Botão para voltar ao dashboard, usando a rota nomeada 'dashboard' -->
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Voltar ao Dashboard</a>
    </div>

    <!-- Tabela principal para listar os chamados, com um estilo de tabela listrada -->
    <table class="table mt-3">
        <!-- Cabeçalho da tabela -->
        <thead>
            <tr>
                <!-- Colunas do cabeçalho -->
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody>
            <!-- Loop do Blade para iterar sobre a coleção de chamados -->
            @foreach ($chamados as $chamado)
                <tr>
                    <!-- Exibe o ID do chamado -->
                    <td>{{ $chamado->id }}</td>
                    <!-- Exibe o título do chamado -->
                    <td>{{ $chamado->titulo }}</td>
                    <!-- Acessa o relacionamento 'situacao' e exibe o nome da situação -->
                    <td>{{ $chamado->situacao->nome }}</td>
                    <!-- Coluna de ações com botões de editar e excluir -->
                    <td>
                        <!-- Botão de edição. A rota 'chamados.edit' recebe o ID do chamado como parâmetro -->
                        <a href="{{ route('chamados.edit', $chamado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <!-- Formulário de exclusão. A rota 'chamados.destroy' é chamada com o método 'DELETE' -->
                        <form action="{{ route('chamados.destroy', $chamado->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <!-- Botão que envia o formulário e exibe um alerta de confirmação antes de excluir -->
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este chamado?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection