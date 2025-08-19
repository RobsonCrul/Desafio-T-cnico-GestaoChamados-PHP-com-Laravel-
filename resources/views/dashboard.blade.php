<!-- Declaração do tipo de documento. A tag `<!DOCTYPE html>` informa ao navegador que o documento é um HTML5. -->
<!DOCTYPE html>
<!-- Tag raiz do documento HTML, com o idioma definido para português do Brasil. -->
<html lang="pt-br">
<head>
    <!-- Define a codificação de caracteres do documento para UTF-8, garantindo que caracteres especiais sejam exibidos corretamente. -->
    <meta charset="UTF-8">
    <!-- Configura a visualização em dispositivos móveis. A largura da página será igual à largura do dispositivo, e a escala inicial será 1.0. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define o título da página que aparece na aba do navegador. -->
    <title>Dashboard</title>
    <!-- Inclui o arquivo de estilo do Bootstrap 5.3 a partir de uma CDN, que fornece classes CSS prontas para estilização. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- O corpo da página. A classe `p-4` do Bootstrap adiciona um padding (espaçamento interno) de 4 unidades em todos os lados. -->
<body class="p-4">

    <!-- Título principal da página. A classe `mb-4` adiciona uma margem inferior de 4 unidades. -->
    <h1 class="mb-4">Dashboard</h1>

    <!-- Contêiner para os botões de navegação. A classe `mb-4` adiciona uma margem inferior. -->
    <div class="mb-4">
        <!-- Um link estilizado como botão (`btn btn-primary`) que redireciona para a rota de criação de chamados. -->
        <a href="{{ route('chamados.create') }}" class="btn btn-primary">Novo Chamado</a>
        <!-- Outro link estilizado como botão secundário (`btn btn-secondary`) que redireciona para a rota de listagem de chamados. -->
        <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Listar Chamados</a>
    </div>

    <!-- Contêiner para os cartões de métricas. A classe `row` cria uma linha flexível do sistema de grid do Bootstrap. -->
    <div class="row">
        <!-- Define uma coluna no grid. Em telas médias (md) e maiores, ela ocupará 3 das 12 colunas disponíveis. -->
        <div class="col-md-3">
            <!-- Um card do Bootstrap. As classes definem a cor do texto, a cor de fundo primária e uma margem inferior. -->
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <!-- Título do card. -->
                    <h5 class="card-title">Total de Chamados</h5>
                    <!-- Parágrafo que exibe a variável `$totalChamados` passada pelo controlador. A classe `fs-3` aumenta o tamanho da fonte. -->
                    <p class="card-text fs-3">{{ $totalChamados }}</p>
                </div>
            </div>
        </div>

        <!-- Coluna para o card de chamados em aberto, com estilo de aviso (amarelo). -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Chamados em Aberto</h5>
                    <p class="card-text fs-3">{{ $chamadosAbertos }}</p>
                </div>
            </div>
        </div>

        <!-- Coluna para o card de chamados resolvidos, com estilo de sucesso (verde). -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Chamados Resolvidos</h5>
                    <p class="card-text fs-3">{{ $chamadosResolvidos }}</p>
                </div>
            </div>
        </div>

        <!-- Coluna para o card do SLA (Service Level Agreement), com estilo de informação (azul claro). -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">SLA no Mês</h5>
                    <!-- Exibe a variável `$sla` seguida do símbolo de porcentagem. -->
                    <p class="card-text fs-3">{{ $sla }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Título para a tabela de chamados por categoria. A classe `mt-4` adiciona uma margem superior. -->
    <h2 class="mt-4">Chamados por Categoria</h2>
    <!-- Início da tabela, com estilo de tabela listrada do Bootstrap. -->
    <table class="table table-striped">
        <!-- Seção de cabeçalho da tabela. -->
        <thead>
            <tr>
                <!-- Cabeçalhos das colunas. -->
                <th>Categoria</th>
                <th>Qtd. de Chamados</th>
            </tr>
        </thead>
        <!-- Seção do corpo da tabela, onde os dados serão exibidos. -->
        <tbody>
            <!-- Loop do Blade para iterar sobre a coleção `$categorias` passada pelo controlador. -->
            @foreach ($categorias as $categoria)
                <tr>
                    <!-- Célula que exibe o nome de cada categoria. -->
                    <td>{{ $categoria->nome }}</td>
                    <!-- Célula que exibe a contagem de chamados para a categoria. A propriedade `chamados_count` é um "agregado" gerado pelo Laravel. -->
                    <td>{{ $categoria->chamados_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
