@extends('layouts.app') 

@section('content') 
<div class="container">
    <h1>Editar Chamado</h1> 

    <form action="{{ route('chamados.update', $chamado->id) }}" method="POST">
        @csrf 
        @method('PUT') 

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" value="{{ $chamado->titulo }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" readonly>{{ $chamado->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $chamado->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="situacao_id" class="form-label">Situação</label>
            <select name="situacao_id" class="form-select">
                @foreach ($situacoes as $situacao)
                    <option value="{{ $situacao->id }}" {{ $chamado->situacao_id == $situacao->id ? 'selected' : '' }}>
                        {{ $situacao->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button> 
        <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Cancelar</a> 
    </form>
</div>
@endsection 
