<?php

use Illuminate\Support\Facades\Route; // Importa a Facade Route para definir as rotas
use App\Http\Controllers\ChamadoController; // Importa o controlador de Chamados
use App\Http\Controllers\SituacaoController; // Importa o controlador de Situações (não usado nas rotas abaixo)
use App\Http\Controllers\DashBoardController; // Importa o controlador do Dashboard
use App\Http\Controllers\CategoriaController; // Importa o controlador de Categorias (não usado nas rotas abaixo)

// Define a rota principal da aplicação ('/'). Quando acessada, ela chama o método 'index' do DashBoardController.
// O método 'name' dá um nome à rota para que ela possa ser referenciada facilmente no código (ex: route('dashboard')).
Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

// Define uma rota de recurso para o controlador de Chamados.
// Isso cria automaticamente várias rotas para os métodos CRUD (create, read, update, delete):
// GET /chamados (index)
// POST /chamados (store)
// GET /chamados/{chamado} (show)
// GET /chamados/{chamado}/edit (edit)
// PUT/PATCH /chamados/{chamado} (update)
// DELETE /chamados/{chamado} (destroy)
Route::resource('chamados', ChamadoController::class);

// Esta rota de criação está duplicada. A rota de recurso já inclui a rota para o método 'create'.
// Se o seu código funcionar com esta linha, ela pode ser mantida, mas a rota de recurso já a define.
// Por padrão, a rota de recurso é: GET /chamados/create.
Route::get('/chamados/create', [ChamadoController::class, 'create'])->name('chamados.create');